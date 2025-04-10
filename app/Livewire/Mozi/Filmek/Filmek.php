<?php

namespace App\Livewire\Mozi\Filmek;

use Exception;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Layout('layouts.fomozi')]
class Filmek extends Component
{
 use WithPagination,
  WithoutUrlPagination;

 #[Url]
 #[Locked]
 public ?string $uuid;

 public ?Category $category;

 public $cartItems,
  $filmnev,
  $jegyar,
  $filmkep,
  $darabszam = 1;
 public array $lastClickTimes = [];

 public ?Movies $selectedMovie = null; // Kiválasztott film a modalhoz
 public bool $isModalOpen = false; // Modal állapota

 // Új tömb a kiválasztott székek tárolására
 public array $selectedSeats = []; // [movieId => ['row' => x, 'seat' => y], ...]

 protected $listeners = ['ujratoltes' => 'loadCart'];

 public function mount()
 {
  try {
   $this->category = Category::where('uuid', $this->uuid)->firstOrFail();
   $this->loadCart();

   if (!$this->category) {
    return $this->redirectRoute('mozi.fooldal');
   }
  } catch (ModelNotFoundException | QueryException) {
   return $this->redirectRoute('mozi.fooldal');
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

     // Ellenőrzés: ha még nem telt el 3 másodperc
     if (($now - ($this->lastClickTimes[$this->selectedMovie->id] ?? 0)) < 3) {
         $this->dispatch('error', message: 'Várj 3 másodpercet, mielőtt újra megpróbálod!');
         return;
     }

     // Frissítjük az utolsó kattintás idejét
     $this->lastClickTimes[$this->selectedMovie->id] = $now;

     try {
         // Ellenőrizzük, hogy foglalható-e a film
         if (!$this->isBookingAvailable($this->selectedMovie)) {
             return $this->dispatch(
                 'error',
                 message: 'A filmet nem lehet lefoglalni!'
             );
         }

         $userId = Auth::id();
         $movieId = $this->selectedMovie->id;
         $addedSeats = []; // Itt tároljuk azokat a székeket, amiket hozzáadtunk a kosárhoz

         foreach ($this->selectedSeats[$this->selectedMovie->id] as $seat) {
             $seatRow = $seat['row'];
             $seatColumn = $seat['seat'];

             // Ellenőrizzük, hogy a szék már benne van-e a kosárban
             $existingCartItem = Cart::where('user_id', $userId)
                 ->where('movie_id', $movieId)
                 ->where('seat_row', $seatRow)
                 ->where('seat_column', $seatColumn)
                 ->first();

             if ($existingCartItem) {
                 $this->dispatch('error', message: 'A ' . ($seatRow + 1) . '. sor ' . ($seatColumn + 1) . '. szék már a kosárban van!');
                 continue; // Ha már benne van, ugrunk a következő székre
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

             $addedSeats[] = ['row' => $seatRow, 'seat' => $seatColumn]; // Hozzáadjuk a sikeresen hozzáadott székeket
         }

         // Ha nem adtunk hozzá széket, akkor ne frissítsük a kosarat
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

 public function nemfoglalhato()
 {
  return $this->dispatch(
   'error',
   message: 'A filmet nem lehet lefoglalni!'
  );
 }

 public function render()
 {
  return view('mozi.filmek.filmek', [
   'movies' => Movies::where('category_id', $this->category->id)->paginate(
    12
   ),
  ])->title($this->category->nev);
 }

 private function isBookingAvailable(Movies $movie): bool
 {
  // Ellenőrizzük, hogy a vetítés időpontja a jövőben van-e
  $vetitesIdatum = $movie->vetitesidatum;
  $vetitesIdopont = $movie->vetitesidopont;

  // Kombináljuk a vetítés dátumát és a vetítés időpontját
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
 
     // Ellenőrizd, hogy a konfigurációs érték létezik-e és numerikus-e
     if (!is_numeric($darabszam)) {
         // Kezeld az esetet, ha a konfigurációs érték nem érvényes
         // Itt dobhatsz egy kivételt, vagy visszatérhetsz egy üres tömbbel,
         // vagy használhatsz egy alapértelmezett értéket
         throw new \Exception('Érvénytelen darabszám konfiguráció!');
     }
 
     $darabszam = (int) $darabszam;
     $oszlopokSzama = 15; // Fixen 15 oszlop
     $sorokSzama = (int) ceil($darabszam / $oszlopokSzama); // Sorok számának kiszámítása
 
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
  // Töröljük a korábbi székfoglalásokat, ha vannak
  $this->selectedSeats[$movieId] = [];

  // Ellenőrizzük, hogy a székek inicializálva vannak-e
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
  $this->selectedSeats = []; // Töröljük a kiválasztott székeket
 }

 public function selectSeat(int $row, int $seat): void
 {
     if (!$this->selectedMovie) {
         return;
     }

     $movieId = $this->selectedMovie->id;
     $userId = Auth::id();

     // Ellenőrizzük, hogy a szék már a kosárban van-e
     $existingCartItem = Cart::where('user_id', $userId)
         ->where('movie_id', $movieId)
         ->where('seat_row', $row)
         ->where('seat_column', $seat)
         ->first();

     if ($existingCartItem) {
         $this->dispatch('error', message: 'A ' . ($row + 1) . '. sor ' . ($seat + 1) . '. szék már a kosárban van!');
         return; // Ha már benne van, nem engedélyezzük a kiválasztást
     }

     // Ha a szék már ki van választva, töröljük a kiválasztást
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

     // Hozzáadjuk a kiválasztott széket a tömbhöz
     $this->selectedSeats[$movieId][] = ['row' => $row, 'seat' => $seat];
     $this->dispatch(
         'success',
         message:
             'A szék sikeresen kiválasztva! <br>Sor: ' .
             ($row + 1) .
             ', Oszlop: ' .
             ($seat + 1)
     );
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
  // Mivel egyszerre több széket lehet választani, a changeSeat funkció nem értelmezhető
  $this->dispatch(
   'error',
   message:
    'Egyszerre több széket is kiválaszthatsz, így a szék áthelyezése nem lehetséges!'
  );
 }

 private function findOriginalSeat(): ?array
 {
  return null; // Ez a funkció nem releváns, ha egyszerre több széket is lehet választani
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
}
