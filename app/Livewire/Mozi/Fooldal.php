<?php

namespace App\Livewire\Mozi;

use Exception;
use PDOException;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Movies;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Főoldal')]
#[Layout('layouts.fomozi')]
class Fooldal extends Component
{
    public $userCount;
    public $weekDays = [];
    public $selectedDate;
    public $registrationChangePercentage;
    public $moviesCount;
    public $movies = [];
    public $currentMovieIndex = 0;
    public array $lastClickTimes = [];

    public $cartItems, $filmnev, $jegyar, $filmkep, $darabszam = 1;

    public ?Movies $selectedMovie = null;
    public bool $isModalOpen = false;
    public array $selectedSeats = [];

    protected $listeners = ['ujratoltes' => 'loadCart'];

    public function mount()
    {
        $this->userCount = User::count();
    
        $cartItems = Cart::with('movie')->get();
        $this->currentMovieIndex = 0;
    
        $currentWeekRegistrations = User::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
    
        $lastWeekRegistrations = User::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();
    
        if ($lastWeekRegistrations > 0) {
            if ($currentWeekRegistrations === $lastWeekRegistrations) {
                $this->registrationChangePercentage = '0,00';
            } else {
                $this->registrationChangePercentage = number_format((($currentWeekRegistrations - $lastWeekRegistrations) / $lastWeekRegistrations) * 100, 2, ',', '.');
            }
        } else {
            $this->registrationChangePercentage = $currentWeekRegistrations > 0 ? '100,00' : '0,00';
        }
    
        $days = ['Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap'];
        $moviesCountForWeek = 0;
    
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->startOfWeek()->addDays($i);
            $this->weekDays[] = [
                'day' => $days[$i],
                'date' => $date->format('d.'),
                'full_date' => $date->format('Y-m-d')
            ];
    
            $moviesCountForDay = Movies::whereDate('vetitesidatum', $date->format('Y-m-d'))->count();
            $moviesCountForWeek += $moviesCountForDay;
        }
    
        $this->moviesCount = $moviesCountForWeek;
        $this->selectedDate = $this->weekDays[0]['full_date'];
        $this->loadMovies();
    }

    public function loadMovies()
    {
        $this->movies = Movies::whereDate('vetitesidatum', $this->selectedDate)->get();
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->loadMovies();
    }

    public function loadMovieData()
    {
        if (is_array($this->movies)) {
            $movieCount = count($this->movies);
        } else {
            $movieCount = $this->movies->count();
        }
    
        if ($movieCount > 0) {
            $this->currentMovieIndex = ($this->currentMovieIndex + 1) % $movieCount;
        }
    }

    public function loadCart()
    {
        $this->cartItems = Cart::where('user_id', Auth::id())->get();
    }

    public function addToCart()
    {
        $now = now()->timestamp;

        if (!$this->selectedMovie) {
            $this->dispatch('error', message: 'Először válasszon filmet!');
            return;
        }

        if (empty($this->selectedSeats[$this->selectedMovie->id])) {
            $this->dispatch('error', message: 'Először válasszon széket!');
            return;
        }

        if (($now - ($this->lastClickTimes[$this->selectedMovie->id] ?? 0)) < 3) {
            $this->dispatch('error', message: 'Várj 3 másodpercet, mielőtt újra megpróbálod!');
            return;
        }

        $this->lastClickTimes[$this->selectedMovie->id] = $now;

        try {
            if (!$this->isBookingAvailable($this->selectedMovie)) {
                return $this->dispatch(
                    'error',
                    message: 'A filmet nem lehet lefoglalni!'
                );
            }

            $userId = Auth::id();
            $movieId = $this->selectedMovie->id;
            $addedSeats = [];

            foreach ($this->selectedSeats[$this->selectedMovie->id] as $seat) {
                $seatRow = $seat['row'];
                $seatColumn = $seat['seat'];

                $existingCartItem = Cart::where('user_id', $userId)
                    ->where('movie_id', $movieId)
                    ->where('seat_row', $seatRow)
                    ->where('seat_column', $seatColumn)
                    ->first();

                if ($existingCartItem) {
                    $this->dispatch('error', message: 'A ' . ($seatRow + 1) . '. sor ' . ($seatColumn + 1) . '. szék már a kosárban van!');
                    continue;
                }

                Cart::addToCart([
                    'user_id' => $userId,
                    'type' => 'movie',
                    'movie_id' => $movieId,
                    'darabszam' => 1,
                    'ar' => $this->selectedMovie->jegyar,
                    'seat_row' => $seatRow,
                    'seat_column' => $seatColumn,
                ]);

                $addedSeats[] = ['row' => $seatRow, 'seat' => $seatColumn];
            }

            if (empty($addedSeats)) {
                return;
            }

            $this->dispatch('ujratoltes');
            $this->loadCart();

            $this->closeSeatSelectionModal();

            return $this->dispatch(
                'success',
                message: 'A filmet sikeresen a kosárba helyezted!'
            );
        } catch (ValidationException $e) {
            return $this->dispatch(
                'error',
                message: $e->validator->errors()->first()
            );
        } catch (ModelNotFoundException | QueryException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception $e) {
            return $this->dispatch(
                'error',
                message: 'Szerveroldali hiba történt! ' . $e->getMessage()
            );
        }
    }
    
    
     private function isBookingAvailable(Movies $movie): bool
     {
      $vetitesIdatum = $movie->vetitesidatum;
      $vetitesIdopont = $movie->vetitesidopont;
    
      $vetitesIdo = Carbon::parse(
       Carbon::parse($vetitesIdatum)->format('Y-m-d') .
        ' ' .
        $vetitesIdopont .
        ':00'
      );

    
      $foglalhato = now() < $vetitesIdo;
    
      return $foglalhato;
     }
    
     private function initializeSeats(): array
     {
         $darabszam = Config::get('app.mozi_darabszam');
     
         if (!is_numeric($darabszam)) {
             throw new \Exception('Érvénytelen darabszám konfiguráció!');
         }
     
         $darabszam = (int) $darabszam;
         $oszlopokSzama = 15;
         $sorokSzama = (int) ceil($darabszam / $oszlopokSzama);
     
         $seats = [];
         $seatCounter = 0;
     
         for ($i = 0; $i < $sorokSzama; $i++) {
             $row = [];
             for ($j = 0; $j < $oszlopokSzama; $j++) {
                 if ($seatCounter < $darabszam) {
                     $row[] = 'szabad';
                     $seatCounter++;
                 } 
             }
             $seats[] = $row;
         }
     
         return $seats;
     }
    
     private function findAvailableSeat(array $seats): ?array
     {
      for ($i = 0; $i < count($seats); $i++) {
       for ($j = 0; $j < count($seats[$i]); $j++) {
        if ($seats[$i][$j] === 'szabad') {
         return ['row' => $i, 'seat' => $j];
        }
       }
      }
      return null;
     }
    
     public function openSeatSelectionModal(int $movieId): void
     {
      $this->selectedMovie = Movies::find($movieId);
      $this->selectedSeats[$movieId] = [];
    
      if (empty($this->selectedMovie->seats)) {
       $this->selectedMovie->seats = $this->initializeSeats();
       $this->selectedMovie->save();
      }
    
      $this->isModalOpen = true;
     }
    
     public function closeSeatSelectionModal(): void
     {
      $this->isModalOpen = false;
      $this->selectedMovie = null;
      $this->selectedSeats = [];
     }
    
     public function selectSeat(int $row, int $seat): void
     {
         if (!$this->selectedMovie) {
             return;
         }
 
         $movieId = $this->selectedMovie->id;
         $userId = Auth::id();
 
         $existingCartItem = Cart::where('user_id', $userId)
             ->where('movie_id', $movieId)
             ->where('seat_row', $row)
             ->where('seat_column', $seat)
             ->first();
 
         if ($existingCartItem) {
             $this->dispatch('error', message: 'A ' . ($row + 1) . '. sor ' . ($seat + 1) . '. szék már a kosárban van!');
             return;
         }
 
         if (isset($this->selectedSeats[$movieId])) {
             foreach ($this->selectedSeats[$movieId] as $key => $selectedSeat) {
                 if (
                     $selectedSeat['row'] === $row &&
                     $selectedSeat['seat'] === $seat
                 ) {
                     unset($this->selectedSeats[$movieId][$key]);
                     $this->dispatch('success', message: 'A szék kiválasztása törölve!');
                     return;
                 }
             }
         }
 
         $this->selectedSeats[$movieId][] = ['row' => $row, 'seat' => $seat];
         $this->dispatch('success', message: 'A szék sikeresen kiválasztva! <br>Sor: ' . ($row + 1) . ', Oszlop: ' . ($seat + 1));
     }
    
     public function isSeatSelected(int $row, int $seat): bool
     {
      if (!$this->selectedMovie) {
       return false;
      }
    
      $movieId = $this->selectedMovie->id;
    
      if (isset($this->selectedSeats[$movieId])) {
       foreach ($this->selectedSeats[$movieId] as $selectedSeat) {
        if (
         $selectedSeat['row'] === $row &&
         $selectedSeat['seat'] === $seat
        ) {
         return true;
        }
       }
      }
    
      return false;
     }
    
     public function changeSeat(): void
     {
      $this->dispatch(
       'error',
       message:
        'Egyszerre több széket is kiválaszthatsz, így a szék áthelyezése nem lehetséges!'
      );
     }
    
     private function findOriginalSeat(): ?array
     {
      return null;
     }
    
     public function getSeatCounts(): array
     {
      $occupiedSeats = 0;
      $freeSeats = 0;
    
      if ($this->selectedMovie && is_array($this->selectedMovie->seats)) {
       foreach ($this->selectedMovie->seats as $row) {
        foreach ($row as $seat) {
         if ($seat === 'foglalt') {
          $occupiedSeats++;
         } else {
          $freeSeats++;
         }
        }
       }
      }
    
      return [
       'occupied' => $occupiedSeats,
       'free' => $freeSeats,
      ];
     }
    
     public function render()
     {
      return view('mozi.fooldal', [
       'weekDays' => $this->weekDays,
       'currentMovie' => $this->movies[$this->currentMovieIndex] ?? null,
      ]);
     }
    
}