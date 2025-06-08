<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DB\ArmazenamentoController;
    use App\Http\Controllers\DB\ResiduosCheController;
    use App\Http\Controllers\DB\ResiduosSaiController;
    use App\Http\Controllers\Page\DashboardController;
    use App\Http\Controllers\Page\RegistrosController;
    use App\Http\Controllers\Page\CadastrosController;
    use App\Http\Controllers\Page\UsuariosController;
    use App\Http\Controllers\Page\RelatorioController;
    use App\Http\Controllers\DB\VeiculoController;
    use App\Http\Controllers\DB\FilialController;
    use App\Http\Controllers\DB\EmpresaController;
    use App\Models\SubResiduos;

    use App\Http\Controllers\Mobile\TesteMobileController;
    use App\Http\Controllers\Mobile\UserMobileController;
    use App\Http\Controllers\Mobile\FilialMobileController;
    use App\Http\Controllers\Mobile\VeiculoMobileController;
    use App\Http\Controllers\Mobile\ResiduosMobileController;
    use App\Http\Controllers\Mobile\SubResiduosMobileController;
    use App\Http\Controllers\Mobile\EntradaMobileController;
    use App\Http\Controllers\Mobile\ArmMobileController;
    use App\Http\Controllers\Mobile\SaidaMobileController;

    // API Mobile
    Route::get('/mobile/teste_api', [TesteMobileController::class, 'teste_api']);
    Route::get('/mobile/usuarios', [UserMobileController::class, 'usuarios']);
    Route::get('/mobile/filial', [FilialMobileController::class, 'filial']);
    Route::get('/mobile/veiculos', [VeiculoMobileController::class, 'veiculos']);
    Route::get('/mobile/residuos', [ResiduosMobileController::class, 'residuos']);
    Route::get('/mobile/sub_residuos', [SubResiduosMobileController::class, 'sub_residuos']);
    Route::get('/mobile/armazenamento', [ArmMobileController::class, 'armazenamento']);
    Route::post('/mobile/entrada/store', [EntradaMobileController::class, 'store']);
    Route::post('/mobile/saida/store', [SaidaMobileController::class, 'store']);

    require __DIR__ . '/auth.php';

    // Welcome
    Route::get('/', function () {
        return view('welcome');
    });

    // Rotas protegidas com middleware
    Route::middleware(['auth', 'verified', \App\Http\Middleware\VerificaStatusAtivo::class])->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'page'])->name('dashboard.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Registros
        Route::get('/registros', [RegistrosController::class, 'page'])->name('registros.index');
        Route::post('/residuos/store', [ResiduosCheController::class, 'store'])->name('residuos.store');
        Route::post('/residuosSaida/store', [ResiduosSaiController::class, 'store'])->name('residuos_sais.store');
        Route::post('/armazenamentos', [ArmazenamentoController::class, 'store'])->name('armazenamentos.store');
        Route::get('/subtipos/{id}', function ($id) {
            return SubResiduos::where('id_resd', $id)->get();
        });

        //Relatorios
        Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
        Route::get('/relatorio/completo', [RelatorioController::class, 'gerarRelatorioCompleto'])->name('relatorio.completo');
        Route::get('/relatorio/diario', [RelatorioController::class, 'gerarRelatorioDiario'])->name('relatorio.diario');
        Route::get('/relatorio/semanal', [RelatorioController::class, 'gerarRelatorioSemanal'])->name('relatorio.semanal');
        Route::get('/relatorio/mensal', [RelatorioController::class, 'gerarRelatorioMensal'])->name('relatorio.mensal');

        // Cadastros
        Route::get('/cadastros', [CadastrosController::class, 'page'])->name('cadastros.index');
        Route::post('/veiculo/store', [VeiculoController::class, 'store'])->name('veiculo.store');
        Route::post('/filial/store', [FilialController::class, 'store'])->name('filial.store');
        Route::post('/empresa/store', [EmpresaController::class, 'store'])->name('empresa.store');

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
?>