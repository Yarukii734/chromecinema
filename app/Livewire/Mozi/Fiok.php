<?php

namespace App\Livewire\Mozi;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Title('Fiók')]
#[Layout('layouts.fomozi')]
class Fiok extends Component {
    
    public ?User $user;

    protected $listeners = ['ujratoltes' => 'mount'];

    public function mount() {
        $this->user = User::find(Auth::user()->id);
    }

    public function render() {
        return view('mozi.fiok');
    }

}
