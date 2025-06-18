<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importe todos os seus controllers mobile aqui
use App\Http\Controllers\Mobile\TesteMobileController;
use App\Http\Controllers\Mobile\UserMobileController;
use App\Http\Controllers\Mobile\FilialMobileController;
use App\Http\Controllers\Mobile\VeiculoMobileController;
use App\Http\Controllers\Mobile\ResiduosMobileController;
use App\Http\Controllers\Mobile\SubResiduosMobileController;
use App\Http\Controllers\Mobile\EntradaMobileController;
use App\Http\Controllers\Mobile\ArmMobileController;
use App\Http\Controllers\Mobile\SaidaMobileController;
use App\Http\Controllers\Mobile\ConsultaMobileController;


// Todas as rotas aqui serão prefixadas com /api/
// Ex: /api/mobile/usuarios

Route::prefix('mobile')->group(function () {
    Route::get('/teste_api', [TesteMobileController::class, 'teste_api']);
    Route::get('/usuarios', [UserMobileController::class, 'usuarios']);
    Route::get('/filial', [FilialMobileController::class, 'filial']);
    Route::get('/veiculos', [VeiculoMobileController::class, 'veiculos']);
    Route::get('/residuos', [ResiduosMobileController::class, 'residuos']);
    Route::get('/sub_residuos', [SubResiduosMobileController::class, 'sub_residuos']);
    Route::get('/armazenamento', [ArmMobileController::class, 'armazenamento']);
    Route::post('/entrada/store', [EntradaMobileController::class, 'store']);
    Route::post('/saida/store', [SaidaMobileController::class, 'store']);

    // Rotas de consulta
    Route::get('/consultas/entradas', [ConsultaMobileController::class, 'getEntradas']);
    Route::get('/consultas/saidas', [ConsultaMobileController::class, 'getSaidas']);
    Route::get('/consultas/armazenamentos', [ConsultaMobileController::class, 'getArmazenamentos']);
});