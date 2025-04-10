<?php

namespace App\Livewire\Mozi\Admin;

use Exception;
use PDOException;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Admin')]
#[Layout('layouts.fomozi')]
class FelhasznaloKezeles extends Component
{
    use WithPagination, WithoutUrlPagination;

    public ?string $vezeteknev = '';
    public ?string $keresztnev = '';
    public ?string $felhasznalonev = '';
    public ?string $email = '';

    public $userCount;
    public ?User $user;
    public $selectedUserId;

    public $osszesKoltes;
    public $ujUgyfelekSzama;
    public $legutobbiVasarlas;
    public $legaktivabbVasarlo;
    public $topVasarlok = [];
    public $userLogs = [];


    public function mount()
    {
        $this->userCount = User::count();
        $this->osszesKoltes = $this->osszesKoltesLekerdezese();
        $this->ujUgyfelekSzama = $this->ujUgyfelekSzamaLekerdezese();
        $this->legutobbiVasarlas = $this->legutobbiVasarlasLekerdezese();
        $this->legaktivabbVasarlo = $this->legaktivabbVasarloLekerdezese();
        $this->topVasarlokLekerdezese();
    }

    public function keresdausert(int $id)
    {
        try {
            $this->user = User::findOrFail($id);
            $this->selectedUserId = $id;

            $this->getUserLogs($id);
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function felhasznalotorles(int $id)
    {
        try {
            User::where('id', $id)->delete();

            $this->dispatch('close-modal');
            return $this->dispatch('success', message: 'Sikeres felhasználó törlés.');
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function render()
    {
        return view('mozi.admin.felhasznalo-kezeles', [
            'users' => User::paginate(9),
            'ujUgyfelekSzama' => $this->ujUgyfelekSzama,
            'legaktivabbVasarlo' => $this->legaktivabbVasarlo,
            'userLogs' => $this->userLogs ?? [],
        ]);
    }
    
    

    public function osszesKoltesLekerdezese()
    {
        try {
            $osszesKoltes = User::sum('total_spent');
            $formattedOsszesKoltes = number_format($osszesKoltes, 0, ',', '.') . ' Ft';
            return $formattedOsszesKoltes;
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function ujUgyfelekSzamaLekerdezese()
    {
        try {
            $harmincNapja = Carbon::now()->subDays(30);
            return User::where('created_at', '>=', $harmincNapja)->count();
        } catch (Exception) {
            return 'N/A';
        }
    }

    public function legutobbiVasarlasLekerdezese()
    {
        try {
            $log = Log::where('action', 'Vásárlás')
                ->orderByDesc('created_at')
                ->first();
    
            if ($log && $log->user) {
                $user = $log->user;
    
                $carbon = Carbon::parse($log->created_at);
                $carbon->locale('hu');
                $idopont = $carbon->diffForHumans();
    
                return "{$user->vezeteknev} {$user->keresztnev} ({$idopont})";
            }
    
            return 'Nincs adat';
        } catch (Exception $e) {
            return 'Hiba történt';
        }
    }
    

    public function legaktivabbVasarloLekerdezese()
    {
        try {
            $topUser = Log::where('action', 'Vásárlás')
                ->selectRaw('user_id, COUNT(*) as vasarlas_szam')
                ->groupBy('user_id')
                ->orderByDesc('vasarlas_szam')
                ->first();
    
            if ($topUser && $topUser->user_id) {
                $user = User::find($topUser->user_id);
    
                if ($user) {
                    $teljesNev = "{$user->vezeteknev} {$user->keresztnev}";
                    return "{$teljesNev} ({$topUser->vasarlas_szam} vásárlás)";
                }
            }
    
            return 'Nincs adat';
        } catch (Exception $e) {
            return 'Hiba történt';
        }
    }
    
    public function topVasarlokLekerdezese()
    {
    $this->topVasarlok = Log::where('action', 'Vásárlás')
        ->selectRaw('user_id, COUNT(*) as vasarlas_db')
        ->groupBy('user_id')
        ->orderByDesc('vasarlas_db')
        ->take(5)
        ->get()
        ->map(function ($log) {
            $user = User::find($log->user_id);
            return [
                'nev' => $user?->vezeteknev . ' ' . $user?->keresztnev,
                'vasarlas_db' => $log->vasarlas_db,
            ];
        });
    }

    public function toggleAdminStatus(int $id)
    {
        try {
            $user = User::findOrFail($id);
        
            $user->admin = $user->admin == 1 ? 0 : 1;
            $user->save();
        
            $this->dispatch('success', message: $user->admin == 1 ? 'Admin jogok sikeresen hozzárendelve.' : 'Admin jogok eltávolítva.');
            
            $this->user = $user;
        } catch (ModelNotFoundException | PDOException) {
            $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }
    
    public function getUserLogs(int $id)
    {
        try {
            $logs = Log::where('user_id', $id)
                ->orderByDesc('created_at')
                ->get();
    
            $this->userLogs = $logs->map(function ($log) {
                $carbon = Carbon::parse($log->created_at);
                $carbon->locale('hu');
    
                $log->created_at_clock = $carbon->diffForHumans(); 
    
                return $log;
            });
    
            if ($logs->isEmpty()) {
                $this->userLogs = [];
            }
    
        } catch (Exception) {
            $this->dispatch('error', message: 'Hiba történt a logok lekérésekor!');
            $this->userLogs = [];
        }
    }
    
}
