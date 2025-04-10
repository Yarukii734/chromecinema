<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Cart;
use App\Models\Movies;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'vezeteknev',
        'keresztnev',
        'felhasznalonev',
        'email',
        'profilkep',
        'password',
        'admin',
        'total_spent',
        'tickets_purchased',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function updateProfilePicture($path)
    {
        $this->profilkep = $path;
        return $this->save();
    }
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function purchasedMoviesCount()
    {
        return $this->cartItems()->where('type', 'movie')->count();
    }
    
    public function purchasedSnacksCount()
    {
        return $this->cartItems()->where('type', 'snack')->count();
    }
    
    public function cartTotalPrice()
    {
        return $this->cartItems()->sum('ar');
    }
    
    public function totalSpent()
    {
        return $this->total_spent ?? 0;
    }
    
    public function purchasedMoviesCountProfile()
    {
        return $this->tickets_purchased ?? 0;
    }

}