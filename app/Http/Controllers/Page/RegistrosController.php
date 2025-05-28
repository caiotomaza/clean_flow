<?php

  namespace App\Http\Controllers\Page;

  use App\Http\Controllers\Controller;
  use App\Models\Armazenamento;
  use App\Models\Filial;
  use App\Models\Residuos;
  use App\Models\ResiduosChe;
  use App\Models\ResiduosSai;
  use App\Models\SubResiduos;
  use App\Models\User;
  use App\Models\Veiculo;
  use Illuminate\Http\Request;
  use Stringable;

  class RegistrosController extends Controller
  {
      public function page(){
          $filiais = Filial::all();
          $placas = Veiculo::all();
          $residuos = Residuos::all();
          $subresiduos = SubResiduos::all();
          $users = User::all();

        $entradas = ResiduosChe::with(['filial', 'responsavel', 'residuo', 'subresiduo'])->orderBy('id_entrada')->get();
        $armazenamentos = Armazenamento::with(['residuo', 'subresiduo'])->orderBy('id_arm')->get();
        $saidas = ResiduosSai::with(['filial', 'armazenamento', 'veiculo'])->orderBy('id_saida')->get();

          return view("registros.index", compact('entradas', 'armazenamentos', 'saidas', 'filiais', 'placas', 'residuos', 'subresiduos', 'users'));
      }
  }
?>