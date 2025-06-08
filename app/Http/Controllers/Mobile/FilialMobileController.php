<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Filial;

    class FilialMobileController extends Controller
    {
        public function filial()
        {
            $filial = Filial::select('id_fil', 'id_emp', 'id_log', 'nome')->get();
            return response()->json($filial);
        }
    }

?>