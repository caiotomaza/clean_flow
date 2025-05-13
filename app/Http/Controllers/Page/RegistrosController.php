<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DB\ReseduosSaiController;
use App\Models\Armazenamento;
use App\Models\Filial;
use App\Models\Reseduos;
use App\Models\Reseduos_che;
use App\Models\reseduos_sai;
use App\Models\Sub_reseduos;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Stringable;

class RegistrosController extends Controller
{
    public function page()
    {
        $filiais = Filial::all();
        $placas = Veiculo::all();
        $residuos = Reseduos::all();
        $subresiduos = Sub_reseduos::all();
        $users = User::all();

        $entradas = Reseduos_che::with(['filial', 'responsavel', 'residuo', 'subresiduo'])
                ->where('tipo_registro', 'entrada')
                ->get();
        $armazenamentos = Armazenamento::with('residuo', 'subresiduo')->get();
        $saidas = reseduos_sai::with(['armazenamento','veiculo', 'filial'])
          ->where('tipo_registro', 'saidas')
          ->get();

        return view("registros.index", compact('entradas', 'armazenamentos', 'saidas', 'filiais', 'placas', 'residuos', 'subresiduos', 'users'));
    }


}
