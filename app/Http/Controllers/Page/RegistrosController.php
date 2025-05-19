<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DB\ReseduosSaiController;
use App\Models\Armazenamento;
use App\Models\Filial;
use App\Models\Reseduos;
use App\Models\ReseduosChe;
use App\Models\ReseduosSai;
use App\Models\Sub_reseduos;
use App\Models\SubReseduos;
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
        $subresiduos = SubReseduos::all();
        $users = User::all();

      $entradas = ReseduosChe::with(['filial', 'responsavel', 'residuo', 'subresiduo'])->orderBy('id_entrada')->get();
      $armazenamentos = Armazenamento::with(['residuo', 'subresiduo'])->orderBy('id_arm')->get();
      $saidas = ReseduosSai::with(['filial', 'armazenamento', 'veiculo'])->orderBy('id_saida')->get();

        return view("registros.index", compact('entradas', 'armazenamentos', 'saidas', 'filiais', 'placas', 'residuos', 'subresiduos', 'users'));
    }


}
