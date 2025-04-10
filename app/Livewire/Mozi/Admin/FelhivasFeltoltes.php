<?php

namespace App\Livewire\Mozi\Admin;

use App\Models\Announcement;
use Exception;
use PDOException;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Title('Admin')]
#[Layout('layouts.fomozi')]

class FelhivasFeltoltes extends Component
{
    public ?string $title = '';
    public ?string $content = '';
    public ?string $date = '';
    public ?string $createdby = '';
    
    public function render()
    {
        return view('mozi.admin.felhivas-feltoltes');
    }

    public function felhivasFeltoltes()
    {
        try {
            $this->validate();

            Announcement::create([
                'title' => $this->title,
                'content' => $this->content,
                'date' => now(),
                'createdby' => $this->createdby ?: null,
            ]);

            $this->reset();
            return $this->dispatch('success', message: 'Sikeres felhívás feltöltés.');
        } catch (ValidationException $e) {
            return $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (ModelNotFoundException | PDOException) {
            return $this->dispatch('error', message: 'Adatbázis hiba történt!');
        } catch (Exception) {
            return $this->dispatch('error', message: 'Szerveroldali hiba történt!');
        }
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'content' => ['required', 'max:5000'],
            'createdby' => ['max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A cím megadása kötelező.',
            'title.max' => 'A cím nem lehet hosszabb, mint :max karakter.',
            'content.required' => 'A tartalom megadása kötelező.',
            'content.max' => 'A tartalom nem lehet hosszabb, mint :max karakter.',
            'createdby.max' => 'A létrehozó neve nem lehet hosszabb, mint :max karakter.',
        ];
    }
}
