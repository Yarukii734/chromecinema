<?php

namespace App\Livewire\Mozi\Admin;

use Exception;
use PDOException;
use App\Models\Snack;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\SnackCategories;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Admin')]
#[Layout('layouts.fomozi')]
class SnackSzerkesztes extends Component
{
    public ?int $category_id = null;
    public ?string $nev = '';
    public ?string $kereses = '';
    public Collection $talalatok;
    public ?int $darabszam = null;
    public ?int $ar = null;
    public ?string $kep = '';
    public ?Snack $snack = null;

    use WithPagination, WithoutUrlPagination;

    public int $snackCount;
    public ?Collection $categories;

    public function mount()
    {
        $this->snackCount = Snack::count();
        $this->categories = SnackCategories::orderBy('id', 'asc')->get();
        $this->talalatok = Snack::all();
    }

    public function search()
    {
        if (empty($this->kereses)) {
            $this->talalatok = Snack::all();
            $this->dispatch('error', message: 'A keresési mező nem lehet üres!');
            return;
        }

        if (strlen($this->kereses) > 1) {
            $snackQuery = Snack::where('nev', 'like', '%' . $this->kereses . '%');
            $category = SnackCategories::where('nev', 'like', '%' . $this->kereses . '%')->first();
            
            if ($category) {
                $snackQuery->orWhereIn('id', $category->snacks->pluck('id'));
                $this->dispatch('success', message: "<b>A keresés sikeres!</b> Kategória: {$category->nev} snackjei is megjelennek.");
            } else {
                $this->dispatch('success', message: 'A keresés sikeresen befejeződött, és az eredmények megjelenítésre kerültek!');
            }

            $this->talalatok = $snackQuery->get();
        } else {
            $this->talalatok = new Collection();
            $this->dispatch('error', message: 'A kereséshez legalább 2 karakter szükséges!');
        }
    }

    public function keresdasnacket(int $id) {
        try {
            $this->snack = Snack::findOrFail($id);

            $this->category_id = $this->snack->category_id;
            $this->nev = $this->snack->nev;
            $this->darabszam = $this->snack->darabszam;
            $this->ar = $this->snack->ar;
            $this->kep = $this->snack->kep;
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function mentes() {
        try {
            $this->validate();

            $this->snack->update([
                'category_id' => $this->category_id,
                'nev' => $this->nev,
                'darabszam' => $this->darabszam,
                'ar' => $this->ar,
                'kep' => $this->kep,
            ]);

            $this->dispatch('close-modal');
            return $this->dispatch('success', message: 'Sikeres snackszerkesztés!');
        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function snacktorles(int $id) {
        try {
            Snack::findOrFail($id)->delete();
            return $this->dispatch('success', message: 'Sikeres snack törlés.');
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function render()
    {
        $snackQuery = Snack::query();

        if (!empty($this->kereses)) {
            $snackQuery->where('nev', 'like', '%' . $this->kereses . '%');
            
            $category = SnackCategories::where('nev', 'like', '%' . $this->kereses . '%')->first();
            if ($category) {
                $snackQuery->orWhereIn('id', $category->snacks->pluck('id'));
                $this->dispatch('success', message: "<b>A keresés sikeres!</b> Kategória: {$category->nev} snackjei is megjelennek.");
            }
        }

        $snacks = $snackQuery->paginate(6);
        $categories = SnackCategories::paginate(10);

        return view('mozi.admin.snack-szerkesztes', [
            'snacks' => $snacks,
            'categories' => $categories ?? new Collection(),
            'kereses' => $this->kereses,
        ]);
    }

    public function rules(): array
    {
        return [
            'nev' => ['required', 'max:50'],
            'ar' => ['required', 'integer', 'min:50', 'max:100000'],
            'darabszam' => ['required', 'integer', 'min:2', 'max:10000'],
            'kep' => ['required', 'max:1000'],
            'category_id' => ['required', 'exists:snack_categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'A kategória kiválasztása kötelező.',
            'category_id.exists' => 'A kiválasztott kategória nem található.',
            'nev.required' => 'A snack nevének megadása kötelező.',
            'nev.max' => 'A snack neve nem lehet több mint :max karakter.',
            'ar.required' => 'Az ár megadása kötelező.',
            'ar.integer' => 'Az ár csak szám lehet.',
            'ar.min' => 'Az ár nem lehet kisebb mint :min Ft.',
            'ar.max' => 'Az ár nem lehet több mint :max Ft.',
            'kep.required' => 'A kép megadása kötelező.',
            'kep.max' => 'A kép URL nem lehet több mint :max karakter.',
            'darabszam.required' => 'A darabszám megadása kötelező.',
            'darabszam.integer' => 'A darabszám csak szám lehet.',
            'darabszam.min' => 'A darabszám nem lehet kisebb mint :min.',
            'darabszam.max' => 'A darabszám nem lehet több mint :max.',
        ];
    }
}
