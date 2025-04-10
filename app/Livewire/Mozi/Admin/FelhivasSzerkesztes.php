<?php

namespace App\Livewire\Mozi\Admin;

use App\Models\Announcement;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Admin')]
#[Layout('layouts.fomozi')]
class FelhivasSzerkesztes extends Component
{
    use WithPagination;

    public ?int $announcementId = null;
    public ?string $title = '';
    public ?string $content = '';
    public ?string $date = '';
    public ?int $createdby = null;
    public ?Announcement $announcement = null;

    public string $kereses = '';

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'date' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A cím megadása kötelező.',
            'title.max' => 'A cím nem lehet hosszabb, mint :max karakter.',
            'content.required' => 'A tartalom megadása kötelező.',
            'date.required' => 'A dátum megadása kötelező.',
            'date.date' => 'Kérlek, érvényes dátumot adj meg.',
        ];
    }

    public function search(): void
    {
        $this->resetPage();
    }

    public function keresdafelhivast(int $id): void
    {
        try {
            $announcement = Announcement::findOrFail($id);
    
            $this->announcement = $announcement;
            $this->announcementId = $announcement->id;
            $this->title = $announcement->title;
            $this->content = $announcement->content;
            $this->date = Carbon::parse($announcement->date)->format('Y-m-d\TH:i');
            $this->createdby = $announcement->createdby;
        } catch (ModelNotFoundException) {
            $this->dispatch('error', message: 'A felhívás nem található!');
        } catch (Exception) {
            $this->dispatch('error', message: 'Váratlan hiba történt!');
        }
    
        $this->dispatch('open-modal');
    }
    

    public function mentes(): void
    {
        try {
            $this->validate();
    
            if ($this->announcement) {
                $this->announcement->update([
                    'title' => $this->title,
                    'content' => $this->content,
                    'date' => Carbon::parse($this->date),
                ]);
    
                $this->dispatch('close-modal');
                $this->dispatch('success', message: 'A felhívás sikeresen szerkesztve!');
            } else {
                $this->dispatch('error', message: 'Nincs kiválasztott felhívás.');
            }
        } catch (ValidationException $e) {
            $this->dispatch('error', message: $e->validator->errors()->first());
        } catch (Exception) {
            $this->dispatch('error', message: 'Váratlan hiba történt!');
        }
    }
    

    public function felhivastorles(int $id): void
    {
        try {
            Announcement::findOrFail($id)->delete();
            $this->dispatch('success', message: 'A felhívás sikeresen törölve!');
        } catch (ModelNotFoundException) {
            $this->dispatch('error', message: 'A felhívás nem található!');
        } catch (Exception) {
            $this->dispatch('error', message: 'Váratlan hiba történt!');
        }
    }

    public function mount(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Announcement::query();

        if ($this->kereses) {
            $search = '%' . $this->kereses . '%';
            $query->where('title', 'like', $search)
                ->orWhere('content', 'like', $search);
        }

        $announcements = $query->orderBy('date', 'desc')->paginate(6);

        return view('mozi.admin.felhivas-szerkesztes', [
            'announcements' => $announcements,
        ]);
    }
}
