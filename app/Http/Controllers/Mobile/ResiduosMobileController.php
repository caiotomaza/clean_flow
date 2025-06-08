<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Residuos;

    class ResiduosMobileController extends Controller
    {
        public function residuos()
        {
            $residuos = Residuos::select('id_resd', 'nome')->get();
            return response()->json($residuos);
        }
    }

?>