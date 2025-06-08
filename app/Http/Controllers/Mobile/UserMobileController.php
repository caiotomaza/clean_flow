<?php

    namespace App\Http\Controllers\Mobile;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth; // Para tentar autenticar o usuário
    use Illuminate\Support\Facades\Hash; // Para verificar a senha
    use Illuminate\Validation\ValidationException; // Para lançar exceções de validação

    class UserMobileController extends Controller
    {
                public function usuarios()
        {
            $users = User::select('id', 'name', 'email')->get();
            return response()->json($users);
        }
    }
?>