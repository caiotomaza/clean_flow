<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Armazenamento;

    class ArmMobileController extends Controller
    {
        public function armazenamento()
        {
            $armazenamento = Armazenamento::select('id_arm', 'container', 'id_sub_resd', 'id_resd', 'peso', 'data_hora', 'tipo_registro')->get();
            return response()->json($armazenamento);
        }
    }

?>