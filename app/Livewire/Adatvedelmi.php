<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('ChromeCinema | Adatvédelmi')]
#[Layout('layouts.fooldal')]
class Adatvedelmi extends Component
{
    public function render()
    {
        return view('adatvedelmi');
    }
}
