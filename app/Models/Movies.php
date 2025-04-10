<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Movies extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'category_id',
        'filmnev',
        'film_ev',
        'filmleiras',
        'film_szin',
        'korhatar',
        'jegyar',
        'vetitesidatum',
        'vetitesidopont',
        'idotartam',
        'filmkep',
        'darabszam',
        'foglalhato',
        'seats',
    ];

    protected $casts = [
        'seats' => 'array',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
