<?php

    namespace App\Http\Controllers\DB;

    use App\Http\Controllers\Controller;
    use App\Models\Veiculo;
    use Illuminate\Http\Request;

    class VeiculoController extends Controller
    {
        public function store(Request $request)
        {
            $validated = $request->validate([
                'id_filial_input' => 'required|exists:filials,id_fil',
                'placa_veiculo' => 'required|string|max:10',
            ]);

            Veiculo::create([
                'id_fil' => $validated['id_filial_input'],
                'placa' => strtoupper($validated['placa_veiculo']),
            ]);

            return redirect()->back()->with('success', 'Veículo cadastrado com sucesso!');
        }
    }
?>