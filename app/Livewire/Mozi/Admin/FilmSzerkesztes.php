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
    public ?string $filmnev = ''; // Film név keresés
    public ?string $kereses = ''; // Keresési mező
    public Collection $talalatok; // Találatok tárolása Collection típusban
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
        // Kategóriák betöltése
        $this->categories = Category::orderBy('id', 'asc')->get();
    
        // Alapértelmezett filmek betöltése
        $this->talalatok = Movies::all();  // Alapértelmezett filmek betöltése
    }
    
    public function search()
    {
        // Ha a keresési mező üres, akkor az összes filmet betöltjük
        if (empty($this->kereses)) {
            $this->talalatok = Movies::all();
            $this->dispatch('error', message: 'A keresési mező nem lehet üres!');
            return;
        }
    
        // Ha a keresési szöveg hossza meghaladja az 1 karaktert
        if (strlen($this->kereses) > 1) {
            // Keresés a film neve alapján
            $moviesQuery = Movies::where('filmnev', 'like', '%' . $this->kereses . '%');
            // Keresés a kategória neve alapján
            $category = Category::where('nev', 'like', '%' . $this->kereses . '%')->first();
            if ($category) {
                // Ha találtunk kategóriát, akkor a hozzá tartozó filmeket is megjelenítjük
                $moviesQuery->orWhereIn('id', $category->movies->pluck('id'));
                $this->dispatch('success', message: "<b>A keresés sikeres!</b> Kategória: {$category->nev} filmjei is megjelennek.");
            }else{
                $this->dispatch('success', message: 'A keresés sikeresen befejeződött, és az eredmények megjelenítésre kerültek!');
            }
    
            // A filmek lekérdezése az összes szűrő alapján
            $this->talalatok = $moviesQuery->get();
        } else {
            // Ha a keresés túl rövid (kevesebb, mint 2 karakter), üzenetet küldünk
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
    
            // Darabszám beolvasása az .env fájlból
            $darabszam = Config::get('app.mozi_darabszam');
            
            // Ellenőrizd, hogy a konfigurációs érték létezik-e és numerikus-e
            if (is_numeric($darabszam)) {
                $movie->darabszam = (int) $darabszam; // Darabszám visszaállítása az .env-ből
            } else {
                // Kezeld az esetet, ha a konfigurációs érték nem érvényes
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
        // Kezdjük egy alapértelmezett lekérdezéssel
        $moviesQuery = Movies::query();
        
        // Ha van keresési feltétel, szűrjük a filmeket a keresett név vagy kategória alapján
        if (!empty($this->kereses)) {
            // Keresés a film név alapján
            $moviesQuery->where('filmnev', 'like', '%' . $this->kereses . '%');
    
            // Keresés a kategória neve alapján
            $category = Category::where('nev', 'like', '%' . $this->kereses . '%')->first();
            if ($category) {
                // Ha találtunk kategóriát, akkor a hozzá tartozó filmeket is megjelenítjük
                $moviesQuery->orWhereIn('id', $category->movies->pluck('id'));
                $this->dispatch('success', message: "<b>A keresés sikeres!</b> Kategória: {$category->nev} filmjei is megjelennek.");
            }
        }
    
        // Az oldalazás biztosítása
        $movies = $moviesQuery->paginate(10);  // 10 film per oldal
    
        // Kategóriák oldalazása
        $categories = Category::paginate(10);  // 10 kategória per oldal
        
        return view('mozi.admin.film-szerkesztes', [
            'movies' => $movies,  // A filmszűrés után oldalazott eredmény
            'categories' => $categories ?? new Collection(),  // Kategóriák oldalazva
            'kereses' => $this->kereses,  // A keresett kifejezés átadása a nézetnek
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
