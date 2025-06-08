<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Veiculo;

    class VeiculoMobileController extends Controller
    {
        public function veiculos()
        {
            $veiculos = Veiculo::select('id_vec', 'id_fil', 'placa')->get();
            return response()->json($veiculos);
        }
    }

?>