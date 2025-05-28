<?php

    namespace App\Http\Controllers\Page;

    use App\Http\Controllers\Controller;
    use App\Models\Veiculo;
    use App\Models\Filial;
    use App\Models\Empresa;
    use App\Models\Municipio;
    use App\Models\Estado;
     use App\Models\TipoEmpresa;

    class CadastrosController extends Controller
    {
        public function page()
        {
            $veiculos = Veiculo::with(['filial'])->orderBy('id_vec')->get();
            $filiais = Filial::with(['empresa'])->orderBy('id_fil')->get();
            $empresas = Empresa::orderBy('id_emp')->get();
            $municipios = Municipio::orderBy('id_mun')->get();
            $estados = Estado::orderBy('id_est')->get();
            $tipo_empresas = TipoEmpresa::orderBy('id_temp')->get();

            return view("cadastros.index", compact('veiculos', 'filiais', 'empresas', 'municipios', 'estados', 'tipo_empresas'));
        }
    }
?>