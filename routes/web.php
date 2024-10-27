<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('home');
Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/stadiums', [\App\Http\Controllers\StadiumController::class, 'index'])->name('stadium.list');
Route::get('/admin/stadiums/create', [\App\Http\Controllers\StadiumController::class, 'create'])->name('stadium.create');
Route::post('/admin/stadiums/store', [\App\Http\Controllers\StadiumController::class, 'store'])->name('stadium.store');
Route::get('/admin/stadiums/{id}', [\App\Http\Controllers\StadiumController::class, 'show'])->name('stadium.show');
Route::get('/admin/stadiums/edit/{id}', [\App\Http\Controllers\StadiumController::class, 'edit'])->name('stadium.edit');
Route::put('/admin/stadiums/update/{id}', [\App\Http\Controllers\StadiumController::class, 'update'])->name('stadium.update');
Route::delete('/admin/stadiums/delete/{id}', [\App\Http\Controllers\StadiumController::class, 'destroy'])->name('stadium.destroy');


Route::get('/admin/equipments', [\App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment.list');
Route::post('/admin/equipments/store', [\App\Http\Controllers\EquipmentController::class, 'store'])->name('equipment.store');


Route::get('/admin/adresses', [\App\Http\Controllers\AdresseController::class, 'index'])->name('adresse.list');
Route::post('/admin/adresses/store', [\App\Http\Controllers\AdresseController::class, 'store'])->name('adresse.store');



//Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
