<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\DashboardController;
use App\Http\Controllers\Page\EntradaController;
use App\Http\Controllers\Page\EntradaMaterialController;
use App\Http\Controllers\Page\HistoricoController;
use App\Http\Controllers\Page\RegisterUserController;
use App\Http\Controllers\Page\RelatorioController;
use App\Http\Controllers\Page\UsuariosController;
use App\Http\Controllers\ProfileController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'page'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.index');

// Navegação
Route::get('/historicos', function () {
    return view('historicos.index');
});
Route::get('/relatorios', function () {
    return view('relatorios.index');
});
Route::get('/usuarios', function () {
    return view('usuarios.index');
});

// Usuários
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');

/*
// Profile (comentado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/