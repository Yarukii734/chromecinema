<?php

namespace App\Livewire\Mozi\Admin;

use Exception;
use PDOException;
use App\Models\Snack;
use Livewire\Component;
use Livewire\Attributes\Title;

use App\Models\SnackCategories;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Admin')]
#[Layout('layouts.fomozi')]

class SnackFeltoltes extends Component
{

    public ?int $category_id = null;
    public ?string $nev = '';
    public ?int $ar = null;
    public ?int $darabszam = null;
    public ?string $kep = '';

    public ?Collection $categories;

    public function mount() {
        $this->categories = SnackCategories::orderBy('id', 'asc')->get();
    }

    public function render()
    {
        return view('mozi.admin.snack-feltoltes');
    }

    public function Snackfeltoltes() {
        try {
            $this->validate();

            Snack::create([
                'nev' => $this->nev,
                'ar' => $this->ar,
                'darabszam' => $this->darabszam,
                'category_id' => $this->category_id,
                'kep' => $this->kep,
            ]);

            $this->reset(['category_id', 'nev', 'darabszam', 'ar', 'kep']);

            return $this->dispatch('success', message: 'Sikeres snack feltöltés.');

        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function rules(): array {
        return [
            'nev' => ['required', 'max:50'],
            'ar' => ['required', 'integer', 'min:50', 'max:100000'],
            'darabszam' => ['required', 'integer', 'min:1', 'max:10000'],
            'category_id' => ['required', 'exists:snack_categories,id'],
            'kep' => ['required', 'max:1000'],
        ];
    }

    public function messages(): array {
        return [
            'nev.required' => 'A snack nevének megadása kötelező.', 
            'nev.max' => 'A snack neve nem lehet több mint :max karakter.',
            'ar.required' => 'Az ár megadása kötelező.',
            'ar.integer' => 'Az ár csak szám lehet.', 
            'ar.min' => 'Az ár nem lehet kisebb mint :min.',
            'ar.max' => 'Az ár nem lehet több mint :max.',
            'darabszam.required' => 'A darabszám megadása kötelező.', 
            'darabszam.integer' => 'A darabszám csak szám lehet.', 
            'darabszam.min' => 'A darabszám nem lehet kisebb mint :min.',
            'darabszam.max' => 'A darabszám nem lehet több mint :max.',
            'category_id.required' => 'A kategória kiválasztása kötelező.', 
            'category_id.exists' => 'A kiválasztott kategória nem található.',
            'kep.required' => 'A kép megadása kötelező.',
            'kep.max' => 'A kép nem lehet több mint :max karakter hosszú.',
        ];
    }

}
