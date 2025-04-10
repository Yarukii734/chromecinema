<?php

namespace App\Livewire\Mozi\Components;

use Exception;
use PDOException;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Navbar extends Component {
    public $cartItems, $totalPrice = 0, $totalCartCount = 0;
    public $announcements;
    public $announcementCount;
    public $kereses = '';
    public $talalatok = [];
    protected $listeners = ['ujratoltes' => 'mount'];

    public function mount() {
        $this->loadCart();
        $this->loadAnnouncements();
    }

    // Keresési gomb metódus
    public function search()
    {
        if (empty($this->kereses)) {
            $this->dispatch('error', message: 'A keresési mező nem lehet üres!');
            return;
        }
        // Ha több, mint 1 karaktert írunk be, keresünk
        if (strlen($this->kereses) > 1) {
            $this->talalatok = Movies::where('filmnev', 'like', '%' . $this->kereses . '%')->get();
            $this->dispatch('success', message: '<b>A keresés sikeres!</b> Nyitsd meg újra a menüt, a kilistázáshoz!');
        } else {
            $this->talalatok = [];
        }
    }

    public function loadCart() {
        $this->cartItems = Cart::where('user_id', Auth::id())->get();
        $this->totalPrice = $this->cartItems->sum(fn($item) => $item->ar * $item->darabszam);
        $this->totalCartCount = $this->cartItems->count();
    }

    public function removeFromCart($id) {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        $this->loadCart();
        return $this->dispatch('success', message: 'A filmet sikeresen kivetted a kosárból!');
    }

    public function loadAnnouncements()
    {
        // Beállítjuk a magyar lokalizációt
        Carbon::setLocale('hu');
    
        // Lekérjük az összes felhívást csökkenő sorrendben
        $this->announcements = Announcement::orderBy('id', 'desc')->get();
    
        // Formázzuk a dátumokat magyar nyelvre és nagy kezdőbetűvel
        foreach ($this->announcements as $announcement) {
            $date = Carbon::parse($announcement->date);
    
            // Ha nem az aktuális évben van, akkor kiírjuk az évet
            if ($date->year !== Carbon::now()->year) {
                $announcement->formatted_date = $date->translatedFormat('Y. F j. - H:i'); // Év + hónap + nap + óra
            } else {
                $announcement->formatted_date = ucfirst($date->translatedFormat('F j. - H:i')); // Csak hónap + nap + óra
            }
        }
    
        $this->announcementCount = $this->announcements->count();
    }

    public function addToCart($movieId)
    {
        try {
            $movie = Movies::where('id', $movieId)->firstOrFail();

            Cart::addToCart([
                'user_id' => Auth::id(),
                'type' => 'movie',
                'movie_id' => $movie->id,
                'darabszam' => 1,
                'ar' => $movie->jegyar,
            ]);
        
            $this->dispatch('ujratoltes');
            $this->loadCart();

            return $this->dispatch('success', message: "A(z) <b>{$movie->filmnev}</b> filmet sikeresen lefoglaltad!");
        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception $e) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt! '.$e->getMessage());
        }
    }

    public function render() {
        return view('components.mozi.navbar', [
            'announcements' => $this->announcements,
            'announcementCount' => $this->announcementCount,
            'talalatok' => $this->talalatok // Ide küldjük a találatokat a nézetbe
        ]);
    }
}
