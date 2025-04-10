<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Elfelejtett jelszó')]
#[Layout('layouts.auth')]
class Forgot extends Component
{
    public function render()
    {
        return view('authentikacio.forgot');
    }
}
