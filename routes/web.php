<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UbicacionController;

// Route::get('/login', function () {
//     return view('index');
// });
//Route::post('/', [UserController::class, 'login'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('soporteDGC/inicio', function () {
    return view('bienvenido');
});

Route::get('soporteDGC/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::get('soporteDGC/areas', [AreaController::class, 'index'])->name('areas.index');
Route::post('soporteDGC/areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('soporteDGC/areas/{idarea}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('soporteDGC/areas/{idarea}', [AreaController::class, 'update'])->name('areas.update');
Route::get('soporteDGC/areas/{idarea}', [AreaController::class, 'destroy'])->name('areas.destroy');

// Ruta para listar las ubicaciones
Route::get('soporteDGC/ubicaciones', [UbicacionController::class, 'index'])->name('ubicaciones.index');
Route::get('soporteDGC/ubicaciones/create', [UbicacionController::class, 'create'])->name('ubicaciones.create');
Route::post('soporteDGC/ubicaciones', [UbicacionController::class, 'store'])->name('ubicaciones.store');

// Ruta para listar las usuarios
Route::get('soporteDGC/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('soporteDGC/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
