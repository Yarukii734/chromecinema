<?php

namespace App\Livewire;

use Exception;
use PDOException;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Snack;
use App\Models\Movies;
use Livewire\Component;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Dotenv\Exception\ValidationException;

#[Title('ChromeCinema | Főoldal')]
#[Layout('layouts.fooldal')]
class Fooldal extends Component {

    public $userCount;
    public $weekDays = [];
    public $selectedDate;
    public $registrationChangePercentage;
    public $moviesCount;
    public $movies = [];
    public $currentMovieIndex = 0; // Nyomkövetés, hogy melyik filmet mutatjuk
    public $cartItems, $filmnev, $ar, $filmkep, $darabszam = 1;
    

    public function mount()
    {
        $this->userCount = User::count();
    
        $cartItems = Cart::with('movie')->get();
        
        // Add initialization for the movie index
        $this->currentMovieIndex = 0; // Start from the first movie
    
        // Calculate registration percentage change
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
    
        Carbon::setLocale('hu');
        // Setup days of the week
        $days = ['Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap'];
        $moviesCountForWeek = 0;  // To accumulate the total count of movies for the week
    
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->startOfWeek()->addDays($i);
            $this->weekDays[] = [
                'day' => $days[$i],
                'date' => $date->format('d.'),
                'month' => mb_convert_case($date->translatedFormat('F'), MB_CASE_TITLE, "UTF-8"),
                'full_date' => $date->format('Y-m-d')
            ];
    
            // Count movies for the current day
            $moviesCountForDay = Movies::whereDate('vetitesidatum', $date->format('Y-m-d'))->count();
            $moviesCountForWeek += $moviesCountForDay;  // Add the day's movie count to the total count for the week
        }
    
        // Set the total number of movies for the whole week
        $this->moviesCount = $moviesCountForWeek;
    
        $this->selectedDate = $this->weekDays[0]['full_date']; // default to Monday
        $this->loadMovies();
    }
    
    public function loadCart()
    {
        $this->cartItems = Cart::where('user_id', Auth::id())->get();
    }

    // Load movies for the selected date
    public function loadMovies()
    {
        $this->movies = Movies::whereDate('vetitesidatum', $this->selectedDate)->get();
    }

    // Change the selected date
    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->loadMovies();
    }

    // Change the current movie index to show the next movie
    public function loadMovieData()
    {
        // Ensure $this->movies is a Collection instance
        if (is_array($this->movies)) {
            $movieCount = count($this->movies); // Use PHP's count() for arrays
        } else {
            $movieCount = $this->movies->count(); // Use count() for Collection objects
        }
    
        if ($movieCount > 0) {
            // Increment the movie index, looping back to 0 if we reach the end of the list
            $this->currentMovieIndex = ($this->currentMovieIndex + 1) % $movieCount;
        }
    }


    public function addToCart($movieId)
    {
        if (!Auth::check()) {
            // Az átirányítást késleltetjük a frontendben JavaScript segítségével
            $this->dispatch('redirectToLogin');
        }
    
        try {
            $userId = Auth::id();  // Mentjük a user ID-t
    
            if (!$userId) {
                $this->dispatch('error', message: 'A film lefoglalásához bejelentkezés szükséges! <b>Átirányítás...</b>');
                return;
            }
    
            $movie = Movies::find($movieId);
    
            if (!$movie) {
                $this->dispatch('error', message: 'A film nem található!');
                return;
            }
    
            $this->dispatch('success', message: "A filmet a mozin belül tudod kosárba tenni!");
        } catch (Exception $e) {
            $this->dispatch('error', message:  'Hiba történt: ' . $e->getMessage());
        }
    }
    
    
    
    
    public function render() {
        return view('fooldal');
    }
}
