<?php

use App\Livewire\ProfilePicture;
use App\Livewire\Adatvedelmi;
use App\Livewire\Aszf;
use App\Livewire\Auth\Forgot;
use App\Livewire\Auth\Login;
use App\Livewire\Mozi\Fiok;
use App\Livewire\Mozi\Fooldal;
use App\Livewire\Auth\Register;
use App\Livewire\Fooldal as FoFooldal;
use App\Livewire\Mozi\Admin\FelhasznaloKezeles;
use App\Livewire\Mozi\Admin\FilmFeltoltes;
use App\Livewire\Mozi\Admin\FilmSzerkesztes;
use App\Livewire\Mozi\Admin\SnackFeltoltes;
use App\Livewire\Mozi\Admin\SnackSzerkesztes;
use App\Livewire\Mozi\Filmek\Filmek;
use App\Livewire\Mozi\Kosar;
use App\Livewire\Mozi\Rolunk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Livewire\Mozi\Admin\FelhivasFeltoltes;
use App\Livewire\StripePayment;

Route::get('/', FoFooldal::class)->name('fooldal');
Route::get('/aszf', Aszf::class)->name('aszf');
Route::get('/adatvedelmi', Adatvedelmi::class)->name('adatvedelmi');
Route::get('/kosar/success', [Kosar::class, 'success'])->name('kosar.success');


Route::get('/payment/success', function () {
    return view('payment.success');
})->name('payment.success');

Route::get('/payment/cancel', function () {
    return view('payment.cancel');
})->name('payment.cancel');


Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/register', Register::class)->name('regisztracio');
    Route::get('/login', Login::class)->name('bejelentkezes');
    Route::get('/forgot', Forgot::class)->name('elfelejtettjelszo');
});

Route::middleware(['web', 'auth', 'redirect'])->group(function () {
    Route::name('mozi.')->group(function () {
        Route::get('/mozi', Fooldal::class)->name('fooldal');
        Route::get('/fiok', Fiok::class)->name('fiok');
        Route::get('/kosar', Kosar::class)->name('kosar');
        Route::get('/rolunk', Rolunk::class)->name('rolunk');


        Route::prefix('/kategoria')->group(function () {
            Route::get('/{uuid}', Filmek::class)->name('filmek');
        });

        Route::middleware(['admin'])->group(function () {
            Route::name('admin.')->group(function () {
                Route::prefix('/admin')->group(function () {
                    Route::get('/filmfeltoltes', FilmFeltoltes::class)->name('filmfeltoltes');
                    Route::get('/filmszerkesztes', FilmSzerkesztes::class)->name('filmszerkesztes');
                    Route::get('/felhasznalokezeles', FelhasznaloKezeles::class)->name('felhasznalokezeles');
                    Route::get('/felhivasfeltoltes', FelhivasFeltoltes::class)->name('felhivasfeltoltes');
                    Route::get('/snackfeltoltes', SnackFeltoltes::class)->name('snackfeltoltes');
                    Route::get('/snackszerkesztes', SnackSzerkesztes::class)->name('snackszerkesztes');
                });
            });
        });

        
    });
});

