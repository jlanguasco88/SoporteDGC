<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;


// Route::get('/login', function () {
//     return view('index');
// });
//Route::post('/', [UserController::class, 'login'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/inicio', function () {
    return view('bienvenido');
});

Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('areas/{idarea}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('areas/{idarea}', [AreaController::class, 'update'])->name('areas.update');
Route::get('/areas/{idarea}', [AreaController::class, 'destroy'])->name('areas.destroy');