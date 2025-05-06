<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\Reseduos;
use App\Models\Reseduos_che;
use App\Models\Sub_reseduos;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    public function page(){
        $placas = Veiculo::all();
        $residuos = Reseduos::all();
        $subresiduos = Sub_reseduos::all();
        $users = User::all();

        $registros = Reseduos_che::with(['responsavel', 'residuo', 'subresiduo'])->get();
        $armazenamento = Armazenamento::with('residuo', 'subresiduo')->get();
    
        return view("registros.index", compact('registros', 'armazenamento', 'placas', 'residuos', 'subresiduos', 'users'));
    }
}
