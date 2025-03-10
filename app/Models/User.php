<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use HasFactory;
    
    protected $table = 'users';

    protected $fillable = [
        'vezeteknev',
        'keresztnev',
        'felhasznalonev',
        'email',
        'profilkep',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array {
        return [
            'password' => 'hashed',
        ];
    }

}