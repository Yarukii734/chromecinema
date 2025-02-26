<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Kategóriába adattal feltölteni ezzel tudjuk
        $movies = [
            ['category_id' => 1,
            'filmnev' => 'A méhész (2024)',
            'filmleiras' => 'Adam Clay (Jason Statham) nyugodt életet él méhészként. Kiderül hogy egykor egy titokzatos, titkos kormányzati ügynökség, a "Méhészek" nevű szervezet ügynöke volt.',
            'korhatar' => 'https://szalkaimozi.hu/images/ages/5-circle.svg',
            'jegyar' => 1590,
            'vetitesidatum' => '2025.06.21', 
            'vetitesidopont' => '15:45', 
            'idotartam' => '1 óra 45 perc',
            'filmkep' => 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/hselS7gFZgP3djhmaYDLID9iwqc.jpg',
            'darabszam' => 63,
            'foglalhato' => true],
        ];

        foreach ($movies as $movie) {
            Movies::create($movie);
        }
    }
}
