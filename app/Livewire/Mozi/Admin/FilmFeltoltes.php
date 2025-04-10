<?php

namespace App\Livewire\Mozi\Admin;

use Exception;
use PDOException;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Admin')]
#[Layout('layouts.fomozi')]

class FilmFeltoltes extends Component
{
    public ?int $categoryid = null;
    public ?string $filmnev = '';
    public ?int $filmev = null;
    public ?string $filmleiras = '';
    public ?string $film_szin = '';
    public ?string $korhatar = '';
    public ?int $jegyar = null;
    public ?string $vetitesidatum = '';
    public ?string $vetitesidopont = '';
    public ?string $idotartam = null;
    public ?string $filmkep = '';
    public ?int $darabszam = null;
    public ?bool $foglalhato = true;

    public ?Collection $categories;

    public function mount() {
        $this->categories = Category::orderBy('id', 'asc')->get();
    }

    public function render()
    {
        return view('mozi.admin.film-feltoltes');
    }

    public function filmfeltoltes() {
        try {
            $this->validate();

            Movies::create([
                'category_id' => (int) $this->categoryid,
                'filmnev' => $this->filmnev,
                'film_ev' => $this->filmev,
                'filmleiras' => $this->filmleiras,
                'korhatar' => $this->korhatar,
                'jegyar' => $this->jegyar,
                'vetitesidatum' => $this->vetitesidatum,
                'vetitesidopont' => $this->vetitesidopont,
                'idotartam' => $this->idotartam,
                'filmkep' => $this->filmkep,
                'darabszam' => (int) $this->darabszam,
                'foglalhato' => (bool) $this->foglalhato,
            ]);

            $this->reset();
            return $this->dispatch('success', message: 'Sikeres film feltöltés.');

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
            'filmnev' => ['required', 'regex:/^[\w\s]+$/ui', 'max:50'],
            'jegyar' => ['required','integer', 'min:500', 'max:100000'],
            'filmev' => ['required', 'integer', 'min:1000', 'max:3000'],
            'korhatar' => ['required', 'max:500'],
            'filmleiras' => ['required', 'max:1000'],
            'categoryid' => ['required', 'exists:category,id'],
            'vetitesidatum' => ['required', 'max:10'],
            'vetitesidopont' => ['required', 'min:2', 'max:50'],
            'idotartam' => ['required', 'min:2', 'max:100'],
            'darabszam' => ['required', 'integer', 'min:2', 'max:10000'],
            'filmkep' => ['required', 'max:1000'],
        ];
    }

    public function messages(): array {
        return [
            'categoryid.required' => 'A Kategória kiválasztása kötelező.', 
            'categoryid.exists' => 'Kiválaszott kategória nem található.',
            'filmnev.required' => 'A Film nevének megadása kötelező.', 
            'filmnev.regex' => 'Nem megengedett karakter van a filmnevébe.',
            'filmnev.max' => 'Film neve nem lehet több mint :max karakter.',
            'filmev.required' => 'A Film éve megadása kötelező.', 
            'filmev.integer' => 'A Film éve csak szám lehet.', 
            'filmev.min' => 'Film éve nem lehet kisebb mint :min karakter.',
            'filmev.max' => 'Film éve nem lehet több mint :max karakter.',
            'filmleiras.required' => 'A Film leírása kötelező.',
            'filmleiras.max' => 'Film leírása nem lehet több mint :max karakter.',
            'korhatar.required' => 'A korhatár megadása kötelező.', 
            'korhatar.max' => 'Korhatár nem lehet több mint :max karakter.',
            'jegyar.required' => 'Jegyár megadása kötelező.',
            'jegyar.integer' => 'A Jegy ár csak szám lehet.', 
            'jegyar.min' => 'Jegyár nem lehet kisebb mint :min karakter.',
            'jegyar.max' => 'Jegyár nem lehet több mint :max karakter.',
            'vetitesidatum.required' => 'A Vetitési dátum megadása kötelező.',
            'vetitesidatum.max' => 'Vetítési dátum nem lehet több mint :max karakter.',
            'vetitesidopont.required' => 'A Vetitési időpont megadása kötelező.',
            'vetitesidopont.min' => 'Vetítési időpont nem lehet több mint :min karakter.',
            'vetitesidopont.max' => 'Vetítési időpont nem lehet több mint :max karakter.',
            'idotartam.required' => 'A Vetitési dátum megadása kötelező.',
            'idotartam.min' => 'Időtartam nem lehet több mint :min karakter.',
            'idotartam.max' => 'Időtartam dátum nem lehet több mint :max karakter.',
            'filmkep.required' => 'A Film kép megadása kötelező.',
            'filmkep.max' => 'Film kép nem lehet több mint :max karakter.',
            'darabszam.required' => 'A Darabszám megadása kötelező.', 
            'darabszam.integer' => 'A Darabszám csak szám lehet.', 
            'darabszam.min' => 'Darabszám nem lehet kisebb mint :min karakter.',
            'darabszam.max' => 'Darabszám nem lehet több mint :max karakter.',
        ];
    }
}
