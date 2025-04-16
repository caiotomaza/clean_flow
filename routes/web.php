<?php

    require __DIR__.'/auth.php';

    use App\Http\Controllers\entrada;
    use App\Http\Controllers\Page\EntradaController;
    use App\Http\Controllers\page\EntradaMaterialController;
    use App\Http\Controllers\Page\HistoricoController;
    use App\Http\Controllers\page\RegisterUserController;
    use App\Http\Controllers\Page\RelatorioController;
    use App\Http\Controllers\Page\UsuariosController;
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    /*
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    */

    // Navegação
    Route::get('/dashboard', function () {return view('dashboard.index');});
    Route::get('/historicos', function () {return view('historicos.index');});
    Route::get('/relatorios', function () {return view('relatorios.index');});
    Route::get('/usuarios', function () {return view('usuarios.index');});

    // Usuario
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');

?>