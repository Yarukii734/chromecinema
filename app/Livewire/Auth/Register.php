<?php

namespace App\Livewire\Auth;

use Exception;
use PDOException;
use App\Models\Log;
use App\Models\User;
use Livewire\Component;
use App\Mail\WelcomeMail;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Regisztráció')]
#[Layout('layouts.auth')]
class Register extends Component {

    public ?string $vezeteknev = '';
    public ?string $keresztnev = '';
    public ?string $felhasznalonev = '';
    public ?string $email = '';
    public ?string $jelszo = '';
    public ?string $jelszomegerosit = '';
    public $year;

    public function mount()
    {
        $this->year = date('Y'); 
    }

    public function render() {
        return view('authentikacio.register');
    }

    public function register() {
        try {
            $this->validate();

            $user = User::create([
                'vezeteknev' => $this->vezeteknev, 
                'keresztnev' => $this->keresztnev, 
                'felhasznalonev' => $this->felhasznalonev, 
                'email' => $this->email, 
                'password' => Hash::make($this->jelszo), 
            ]);

            Log::create([
                'user_id' => $user->id, // A regisztrált felhasználó ID-ja
                'action' => 'Regisztráció',
                'details' => 'Sikeres regisztráció.'
            ]);
            
            Mail::to($user->email)->send(new WelcomeMail($user));

            return $this->dispatch('success', message: 'Sikeres regisztráció. Ellenőrizd az emailjeidet!', redirect: route('bejelentkezes'));

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
            'vezeteknev' => ['required', 'regex:/^[\w\s]+$/ui', 'max:50'],
            'keresztnev' => ['required', 'regex:/^[\w\s]+$/ui', 'max:50'],
            'felhasznalonev' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'min:3', 'max:50', 'unique:users,felhasznalonev'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'jelszo' => ['required', 'min:5', 'max:255'],
            'jelszomegerosit' => ['required', 'min:5', 'max:255', 'same:jelszo'],
        ];
    }

    public function messages(): array {
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
            'jelszo.required' => 'A jelszó megadása kötelező.',
            'jelszo.min' => 'Jelszavad nem lehet kisebb mint :min karakter.',
            'jelszo.max' => 'Jelszavad nem lehet több mint :max karakter.',
            'jelszomegerosit.required' => 'A jelszó megerősítése kötelező.',
            'jelszomegerosit.min' => 'Jelszavad nem lehet kisebb mint :min karakter.',
            'jelszomegerosit.max' => 'Jelszavad nem lehet több mint :max karakter.',
            'jelszomegerosit.same' => 'A két jelszavad nem egyezzik meg..',
        ];
    }
}
