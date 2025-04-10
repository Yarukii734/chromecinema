<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfileUpdateNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    // Konstruktor, hogy át tudd adni a User objektumot
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // Az email felépítése
    public function build()
    {
        return $this->subject('Profilod sikeresen frissítve!')
                    ->view('emails.profileupdate')
                    ->with([
                        'user' => $this->user,
                    ]);
    }
}
