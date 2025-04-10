<?php

namespace App\Livewire\Mozi\Components;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Sidebar extends Component {

    public ?Collection $categories;

    public function mount() {
        $this->categories = Category::all();
    }

    public function render() {
        return view('components.mozi.sidebar');
    }

}
