<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Cart; // Ha kosár modell van
use App\Models\Movies; // Ha filmekkel kapcsolatos információk vannak

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
        'total_spent', // Ne felejtsd el a new total_spent mezőt is hozzáadni!
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
        return $this->save();  // Frissíti az adatbázist
    }
    // Kosár kapcsolat, hogy lekérdezhessük a vásárolt jegyeket
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    
    // Vásárolt filmek száma
    public function purchasedMoviesCount()
    {
        return $this->cartItems()->where('type', 'movie')->count();
    }
    
    // Vásárolt snackek száma
    public function purchasedSnacksCount()
    {
        return $this->cartItems()->where('type', 'snack')->count();
    }
    
    // Összes költés kiszámítása (a kosár alapján)
    public function cartTotalPrice()
    {
        return $this->cartItems()->sum('ar'); // Kosárban lévő tételek árának összege
    }
    
    // Összes költés adatbázisból
    public function totalSpent()
    {
        return $this->total_spent ?? 0; // Ha `total_spent` mezőben tárolod
    }
    
    public function purchasedMoviesCountProfile()
    {
        return $this->tickets_purchased ?? 0;
    }

}