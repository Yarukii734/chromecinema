<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'type',
        'movie_id',
        'snack_id',
        'darabszam',
        'ar',
        'seat_row',
        'seat_column',
    ];

    public function movie() {
        return $this->belongsTo(Movies::class, 'movie_id');
    }

    public function snack() {
        return $this->belongsTo(Snack::class, 'snack_id');
    }

    public static function addToCart($data) {
        return self::create([
            'user_id' => $data['user_id'],
            'type' => $data['type'],
            'movie_id' => $data['type'] === 'movie' ? $data['movie_id'] : null,
            'snack_id' => $data['type'] === 'snack' ? $data['snack_id'] : null,
            'darabszam' => $data['darabszam'],
            'ar' => $data['ar'],
            'seat_row' => $data['type'] === 'movie' ? $data['seat_row'] : null,
            'seat_column' => $data['type'] === 'movie' ? $data['seat_column'] : null, 
        ]);
    }    

}