<?php

namespace App\Livewire\Mozi\Admin;

use Exception;
use PDOException;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Admin')]
#[Layout('layouts.fomozi')]
class FilmSzerkesztes extends Component
{
    public ?int $categoryid = null;
    public ?string $filmnev = '';
    public ?string $kereses = '';
    public Collection $talalatok;
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
    public ?Movies $movie;
    
    use WithPagination, WithoutUrlPagination;
    
    public $moviesCount;
    public ?Collection $categories;
    
    public function mount()
    {
        $this->categories = Category::orderBy('id', 'asc')->get();
    
        $this->talalatok = Movies::all();
    }
    
    public function search()
    {
        if (empty($this->kereses)) {
            $this->talalatok = Movies::all();
            $this->dispatch('error', message: 'A keresési mező nem lehet üres!');
            return;
        }
    
        if (strlen($this->kereses) > 1) {
            $moviesQuery = Movies::where('filmnev', 'like', '%' . $this->kereses . '%');
            $category = Category::where('nev', 'like', '%' . $this->kereses . '%')->first();
            if ($category) {
                $moviesQuery->orWhereIn('id', $category->movies->pluck('id'));
                $this->dispatch('success', message: "<b>A keresés sikeres!</b> Kategória: {$category->nev} filmjei is megjelennek.");
            }else{
                $this->dispatch('success', message: 'A keresés sikeresen befejeződött, és az eredmények megjelenítésre kerültek!');
            }
    
            $this->talalatok = $moviesQuery->get();
        } else {
            $this->talalatok = new Collection();
            $this->dispatch('error', message: 'A kereséshez legalább 2 karakter szükséges!');
        }
    }
    
    
    
    public function keresdafilmet(int $id) {
        try {
            $this->movie = Movies::where('id', $id)->FirstOrFail();

            if ($this->movie) {
                $this->categoryid = $this->movie->category_id;
                $this->filmnev = $this->movie->filmnev;
                $this->filmev = $this->movie->film_ev;
                $this->filmleiras = $this->movie->filmleiras;
                $this->korhatar = $this->movie->korhatar;
                $this->jegyar = $this->movie->jegyar;
                $this->vetitesidatum = $this->movie->vetitesidatum;
                $this->vetitesidopont = $this->movie->vetitesidopont;
                $this->idotartam = $this->movie->idotartam;
                $this->filmkep = $this->movie->filmkep;
                $this->darabszam = $this->movie->darabszam;
                $this->foglalhato = $this->movie->foglalhato;
            }

        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function modalszerkesztes() {
        $this->movie->update([
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

    }

    public function mentes()
    {
        try {
            $this->validate();

            $this->movie->update([
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

            $this->dispatch('close-modal');
            return $this->dispatch('success', message: 'Sikeres filmszerkesztés!');
        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception $e) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function filmtorles(int $id) {
        try {
            Movies::where('id', $id)->delete();
            
            return $this->dispatch('success', message: 'Sikeres film törlés.');
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function setSeatsToNull(int $movieId)
    {
        try {
            $movie = Movies::findOrFail($movieId);
            $movie->seats = null;
    
            $darabszam = Config::get('app.mozi_darabszam');
            
            if (is_numeric($darabszam)) {
                $movie->darabszam = (int) $darabszam;
            } else {
                $this->dispatch('error', message: 'Érvénytelen darabszám konfiguráció!');
                return;
            }
    
            $movie->save();

            $this->dispatch('success', message: 'Az összes foglalás sikeresen törölve, a darabszám visszaállítva <b>' . $movie->darabszam . '</b>-ra, és a székrend újraszámolva.<br>Ne felejts el új dátumot megadni.');
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function render()
    {
        $moviesQuery = Movies::query();
        
        if (!empty($this->kereses)) {
            $moviesQuery->where('filmnev', 'like', '%' . $this->kereses . '%');
    
            $category = Category::where('nev', 'like', '%' . $this->kereses . '%')->first();
            if ($category) {
                $moviesQuery->orWhereIn('id', $category->movies->pluck('id'));
                $this->dispatch('success', message: "<b>A keresés sikeres!</b> Kategória: {$category->nev} filmjei is megjelennek.");
            }
        }
    
        $movies = $moviesQuery->paginate(10);
    
        $categories = Category::paginate(10);
        
        return view('mozi.admin.film-szerkesztes', [
            'movies' => $movies,
            'categories' => $categories ?? new Collection(),
            'kereses' => $this->kereses,
        ]);
    }
    
    
    

    public function rules(): array {
        return [
            'filmnev' => ['required', 'max:50'],
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
            'filmnev.max' => 'Film neve nem lehet több mint :max karakter.',
            'filmev.required' => 'A Film neve megadása kötelező.', 
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
