<?php

use App\Livewire\Auth\Login;
use App\Livewire\Mozi\Fiok;
use App\Livewire\Mozi\Fooldal;
use App\Livewire\Auth\Register;
use App\Livewire\Mozi\Admin\FelhasznaloKezeles;
use App\Livewire\Mozi\Admin\FilmFeltoltes;
use App\Livewire\Mozi\Admin\FilmSzerkesztes;
use App\Livewire\Mozi\Filmek\Filmek;
use App\Livewire\Mozi\Kosar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('fooldal');
});

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/register', Register::class)->name('regisztracio');
    Route::get('/login', Login::class)->name('bejelentkezes');
});

Route::middleware(['web', 'auth', 'redirect'])->group(function () {
    Route::name('mozi.')->group(function () {
        Route::get('/mozi', Fooldal::class)->name('fooldal');
        Route::get('/fiok', Fiok::class)->name('fiok');
        Route::get('/kosar', Kosar::class)->name('kosar');


        Route::prefix('/kategoria')->group(function () {
            Route::get('/{uuid}', Filmek::class)->name('filmek');
        });

        Route::middleware(['admin'])->group(function () {
            Route::name('admin.')->group(function () {
                Route::prefix('/admin')->group(function () {
                    Route::get('/filmfeltoltes', FilmFeltoltes::class)->name('filmfeltoltes');
                    Route::get('/filmszerkesztes', FilmSzerkesztes::class)->name('filmszerkesztes');
                    Route::get('/felhasznalokezeles', FelhasznaloKezeles::class)->name('felhasznalokezeles');
                });
            });
        });

        
    });
});


Route::get('/forgot', function () {
    return view('authentikacio.forgot');
})->name('elfelejtettjelszo');