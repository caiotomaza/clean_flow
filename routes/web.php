<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DB\ArmazenamentoController;
use App\Http\Controllers\DB\ReseduosCheController;
use App\Http\Controllers\DB\ReseduosSaiController;
use App\Http\Controllers\Page\DashboardController;
use App\Http\Controllers\Page\EntradaController;
use App\Http\Controllers\Page\EntradaMaterialController;
use App\Http\Controllers\Page\RegistrosController;
use App\Http\Controllers\Page\RegisterUserController;
use App\Http\Controllers\Page\CadastrosController;
use App\Http\Controllers\Page\UsuariosController;
use App\Http\Controllers\ProfileController;
use App\Models\sub_reseduos;

require __DIR__ . '/auth.php';

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Rotas protegidas com middleware
Route::middleware(['auth', 'verified', \App\Http\Middleware\VerificaStatusAtivo::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'page'])->name('dashboard.index');

    // Registros
    Route::get('/registros', [RegistrosController::class, 'page'])->name('registros.index');
    Route::post('/residuos/store', [ReseduosCheController::class, 'store'])->name('residuos.store');
    Route::post('/residuosSaida/store', [ReseduosSaiController::class, 'store'])->name('reseduos_sais.store');
    Route::post('/armazenamentos', [ArmazenamentoController::class, 'store'])->name('armazenamentos.store');
    Route::get('/subtipos/{id}', function ($id) {
        return sub_reseduos::where('id_resd', $id)->get();
    });

    // Cadastros
    Route::get('/cadastros', [CadastrosController::class, 'page'])->name('cadastros.index');

    // Usuários
    Route::get('/usuarios', [UsuariosController::class, 'page'])->name('usuarios.index');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

    /*
    // Profile (comentado)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    */
});
