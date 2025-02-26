<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component {

    public function render() {
        return view('logout');
    }

    public function logout() {

        Auth::logout();        
        session()->invalidate();
        session()->regenerateToken();
        
        return $this->dispatch('success', message: 'Sikeres kijelentkezés!', redirect: route('bejelentkezes'));
    }

}