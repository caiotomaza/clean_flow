<?php

use App\Http\Controllers\DB\ArmazenamentoController;
use App\Http\Controllers\DB\ReseduosCheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\DashboardController;
use App\Http\Controllers\Page\EntradaController;
use App\Http\Controllers\Page\EntradaMaterialController;
use App\Http\Controllers\Page\HistoricoController;
use App\Http\Controllers\Page\RegisterUserController;
use App\Http\Controllers\Page\RelatorioController;
use App\Http\Controllers\Page\UsuariosController;
use App\Http\Controllers\ProfileController;
use App\Models\sub_reseduos;

require __DIR__ . '/auth.php';

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'page'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.index');

// Historio
Route::get('/historicos', [HistoricoController::class, 'page'])->name('historicos.index');
Route::post('/residuos/store', [ReseduosCheController::class, 'store'])->name('residuos.store');
Route::post('/armazenamentos', [ArmazenamentoController::class, 'store'])->name('armazenamentos.store');
Route::get('/subtipos/{id}', function ($id) {
    return sub_reseduos::where('id_resd', $id)->get();
});


// Relatorios
Route::get('/relatorios', [RelatorioController::class, 'page'])->name('relatorios.index');

// Usuários
Route::get('/usuarios',[UsuariosController::class, 'page'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

/*
// Profile (comentado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/