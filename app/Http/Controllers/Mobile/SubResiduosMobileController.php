<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\SubResiduos;

    class SubResiduosMobileController extends Controller
    {
        public function sub_residuos()
        {
            $sub_residuos = SubResiduos::select('id_sub_resd', 'id_resd', 'nome')->get();
            return response()->json($sub_residuos);
        }
    }

?>