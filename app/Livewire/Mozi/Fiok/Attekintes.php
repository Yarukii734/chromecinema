<?php

namespace App\Livewire\Mozi\Fiok;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Attekintes extends Component {

    public ?User $user;

    protected $listeners = ['ujratoltes' => 'mount'];

    public function mount() {
        $this->user = User::find(Auth::user()->id);
    }

    public function render() {
        return view('mozi.fiok.attekintes');
    }

}