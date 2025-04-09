<?php

namespace App\Livewire\Mozi;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Rólunk')]
#[Layout('layouts.fomozi')]
class Rolunk extends Component
{
    public function render()
    {
        return view('mozi.rolunk');
    }
}
