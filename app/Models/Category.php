<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    
    protected $table = 'category';

    protected $fillable = [
        'nev',
        'uuid',
    ];

    public function movies()
    {
        return $this->hasMany(Movies::class);
    }
}
