<?php

    namespace App\Http\Controllers\Page;

    use App\Http\Controllers\Controller;
    use App\Models\Veiculo;
    use App\Models\Filial;
    use App\Models\Empresa;

    class CadastrosController extends Controller{
        public function page(){
            $veiculos = Veiculo::with(['filial'])->orderBy('id_vec')->get();
            $filiais = Filial::with(['empresa'])->orderBy('id_fil')->get();
            $empresas = Empresa::orderBy('id_emp')->get();

            return view("cadastros.index", compact('veiculos', 'filiais', 'empresas'));
        }
    }
?>