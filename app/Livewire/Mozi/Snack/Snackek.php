<?php

namespace App\Livewire\Mozi;

use Livewire\Component;
use App\Models\Snack;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Exception;
use PDOException;
use Illuminate\Validation\ValidationException;

class Snackek extends Component
{
    public $snacknev, $snackkategoria, $ar, $snackkep, $cartItems, $darabszam = 1;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = Cart::where('user_id', Auth::id())->get();
    }

    public function addToCart($snackId)
    {
        try {
            $snack = Snack::where('id', $snackId)->firstOrFail();

            Cart::addToCart([
                'user_id' => Auth::id(),
                'type' => 'snack',
                'snack_id' => $snack->id,
                'darabszam' => 1,
                'ar' => $snack->ar,
            ]);

            $this->loadCart();

            return $this->dispatch('success', message: 'A snack sikeresen hozzáadva a kosárhoz!');
        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (Exception | PDOException $e) {
            return $this->dispatch('error', message: 'Hiba történt!');
        }
    }

    public function render()
    {
        return view('mozi.snackek.index', [
            'snacks' => Snack::paginate(12),
        ]);
    }
}
