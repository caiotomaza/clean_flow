<?php

use App\Http\Controllers\entrada;
use App\Http\Controllers\Page\EntradaController;
use App\Http\Controllers\Page\HistoricoController;
use App\Http\Controllers\Page\RelatorioController;
use App\Http\Controllers\Page\UsuariosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/entrada',[EntradaController::class, 'page'])->name('entrada.index');
Route::get('/historico',[HistoricoController::class, 'page'])->name('historico.index');
Route::get('/relatorios',[RelatorioController::class, 'page'])->name('relatorios.index');
Route::get('/usuarios',[UsuariosController::class, 'page'])->name('usuarios.index');

require __DIR__.'/auth.php';
