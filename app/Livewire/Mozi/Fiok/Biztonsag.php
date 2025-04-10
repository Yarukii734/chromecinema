<?php

namespace App\Livewire\Mozi\Fiok;

use App\Models\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Biztonsag extends Component
{
    public $logs;

    public function mount()
    {
        $this->logs = Log::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
    }

    public function render() {
        return view('mozi.fiok.biztonsag', ['logs' => $this->logs]);
    }

}
