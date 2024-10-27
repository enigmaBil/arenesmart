<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('home');
Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::group(['middleware' => 'auth', 'prefix' => 'stadium', 'as' => 'stadium.'], function () {
    Route::get('/', [\App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\Frontend\FrontController::class, 'statiumDetails'])->name('details');
});
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'profile', 'as' =>  'profile.'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'admin', 'as' =>  'admin.'], function () {
        Route::group(['prefix' => 'stadium', 'as' =>  'stadium.'], function () {
            Route::get('/', [\App\Http\Controllers\StadiumController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\StadiumController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\StadiumController::class,'store'])->name('store');
            Route::get('/{id}', [\App\Http\Controllers\StadiumController::class, 'show'])->name('details');
            Route::get('/{id}/edit', [\App\Http\Controllers\StadiumController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\StadiumController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\StadiumController::class, 'destroy'])->name('destroy');
        });
        Route::group(['prefix' => 'reservation', 'as' =>  'reservation.'], function () {
            Route::get('/', [\App\Http\Controllers\ReservationController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\ReservationController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\ReservationController::class,'store'])->name('store');
            Route::get('/{id}/edit', [\App\Http\Controllers\ReservationController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\ReservationController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('destroy');
        });
    });
});
require __DIR__.'/auth.php';
