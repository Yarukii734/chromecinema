<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SnackCategories extends Model {

    protected $table = 'snack_categories';

    protected $fillable = [
        'nev',
        'kep',
    ];   

    public function snacks()
{
    return $this->hasMany(Snack::class, 'category_id');
}
}