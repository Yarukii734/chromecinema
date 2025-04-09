<?php

namespace App\Livewire\Auth;

use Exception;
use PDOException;
use App\Models\Log;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Bejelentkezés')]
#[Layout('layouts.auth')]
class Login extends Component {

    public ?string $email = '';
    public ?string $jelszo = '';

    public $year;

    public function mount()
    {
        $this->year = date('Y');
    }


    public function render() {
        return view('authentikacio.login');
    }

    public function login() {
        try {
            $this->validate();
            
            if(!Auth::attempt(['email' => $this->email, 'password' => $this->jelszo])) {
                return $this->dispatch('error', message: 'Helytelen email cím vagy jelszó!');
            };

            session()->regenerate();

            Log::create([
                'user_id' => Auth::id(),
                'action' => 'Bejelentkezés',
                'details' => 'Sikeresen beléptél az oldalra.',
            ]);

            return $this->dispatch('success', message: 'Sikeres bejelentkezés.', redirect: route('mozi.fooldal'));

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
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'jelszo' => ['required', 'min:5', 'max:255'],
        ];
    }

    public function messages(): array {
        return [
            'email.required' => 'Email cím megadása kötelező.',
            'email.email' => 'Email cím nem megfelelő formátumú.',
            'email.max' => 'Email címed nem lehet több mint :max karakter.',
            'email.exists' => 'Az email cím nem található.',
            'jelszo.required' => 'A jelszó megadása kötelező.',
            'jelszo.min' => 'Jelszavad nem lehet kisebb mint :min karakter.',
            'jelszo.max' => 'Jelszavad nem lehet több mint :max karakter.',
        ];
    }
}
