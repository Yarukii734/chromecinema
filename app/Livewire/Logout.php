<?php

namespace App\Livewire;

use App\Models\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component {

    public function render() {
        return view('logout');
    }

    public function logout() {

        if (Auth::check()) {
            // Kijelentkezés logolása
            Log::create([
                'user_id' => Auth::id(),
                'action' => 'Kijelentkezés',
                'details' => 'Sikeresen kijelentkeztél.',
            ]);
        }


        Auth::logout();        
        session()->invalidate();
        session()->regenerateToken();
        
        return $this->dispatch('success', message: 'Sikeres kijelentkezés!', redirect: route('bejelentkezes'));
    }

}