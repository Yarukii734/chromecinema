<?php

namespace App\Livewire\Mozi\Fiok;

use Exception;
use PDOException;
use App\Models\Log;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileUpdateNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Beallitasok extends Component
{
    use WithFileUploads;

    public ?string $vezeteknev = '';
    public ?string $keresztnev = '';
    public ?string $felhasznalonev = '';
    public ?string $email = '';
    public ?User $user;

    public function mount()
    {
        $this->user = User::find(Auth::user()->id);

        if ($this->user) {
            $this->vezeteknev = $this->user->vezeteknev;
            $this->keresztnev = $this->user->keresztnev;
            $this->felhasznalonev = $this->user->felhasznalonev;
            $this->email = $this->user->email;
        }
    }

    public function render()
    {
        return view('mozi.fiok.beallitasok');
    }

    public function mentes()
    {
        try {
            $this->validate();



            $this->user->update([
                'vezeteknev' => $this->vezeteknev,
                'keresztnev' => $this->keresztnev,
                'felhasznalonev' => $this->felhasznalonev,
                'email' => $this->email,
            ]);

            $this->user->save();
            Log::create([
                'user_id' => Auth::id(),
                'action' => 'Profil frissítés',
                'details' => 'Sikeresen frissítetted a beállításaid.',
            ]);

            Mail::to($this->user->email)->send(new ProfileUpdateNotification($this->user));

            $this->dispatch('ujratoltes');

            return $this->dispatch('success', message: 'Sikeres adatmódosítás!');
        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception $e) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function rules(): array
    {
        return [
            'vezeteknev' => ['required', 'regex:/^[\w\s]+$/ui', 'max:50'],
            'keresztnev' => ['required', 'regex:/^[\w\s]+$/ui', 'max:50'],
            'felhasznalonev' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'min:3', 'max:50', 'unique:users,felhasznalonev,' . $this->user->id],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
        ];
    }


    public function messages(): array
    {
        return [
            'vezeteknev.required' => 'A vezetéknév megadása kötelező.',
            'vezeteknev.regex' => 'Nem megengedett karakter van a vezetéknévbe.',
            'vezeteknev.max' => 'Vezetékneved nem lehet több mint :max karakter.',
            'keresztnev.required' => 'A keresztnév megadása kötelező.',
            'keresztnev.regex' => 'Nem megengedett karakter van a keresztnévbe.',
            'keresztnev.max' => 'Keresztneved nem lehet több mint :max karakter.',
            'felhasznalonev.required' => 'A felhasználónév megadása kötelező.',
            'felhasznalonev.regex' => 'Nem megengedett karakter van a felhasználónévbe.',
            'felhasznalonev.min' => 'Felhasználóneved nem lehet kisebb mint :min karakter.',
            'felhasznalonev.max' => 'Felhasználóneved nem lehet több mint :max karakter.',
            'felhasznalonev.unique' => 'Felhasználóneved már használatban van.',
            'email.required' => 'Email cím megadása kötelező.',
            'email.email' => 'Email cím nem megfelelő formátumú.',
            'email.max' => 'Email címed nem lehet több mint :max karakter.',
            'email.unique' => 'Az email cím már használatban van.',
        ];
    }
}
