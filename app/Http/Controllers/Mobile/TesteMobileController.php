<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class TesteMobileController extends Controller
    {
        public function teste_api()
        {
            return response()->json([
                'teste_api' => 'API Laravel funcionando!'
            ]);
        }
    }

?>