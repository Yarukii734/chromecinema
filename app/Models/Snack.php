<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Snack extends Model {

    use HasFactory;

    protected $table = 'snacks';

    protected $fillable = [
        'id',
        'category_id',
        'nev',
        'darabszam',
        'kategoria',
        'ar',
        'kep',
    ];

    public function snackCategory() {
        return $this->belongsTo(SnackCategories::class, 'category_id');
    }

}