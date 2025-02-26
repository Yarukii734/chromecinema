<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //Kategória feltöltéshez ha újat akarunk létrehozni ez kell
        //$categories= [
            //['nev' => 'Akció', 'uuid' => Str::uuid()],
            //['nev' => 'Dráma', 'uuid' => Str::uuid()],
            //['nev' => 'Vígjáték', 'uuid' => Str::uuid()],
            //['nev' => 'Sci-fi', 'uuid' => Str::uuid()],
            //['nev' => 'Mese', 'uuid' => Str::uuid()],
            //['nev' => 'Romantikus', 'uuid' => Str::uuid()],
        //];

        //foreach ($categories as $category) {
            //Category::create($category);
        //}


        //Felhasználókkal ezzel tudjuk feltölteni az adatbázist (kurva sok számot ne adj mert mert kifagy a gecibe maximum 100db-ot egyszerre.)
        User::factory()->count(18)->create();
    }
}
