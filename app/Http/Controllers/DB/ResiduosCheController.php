<?php

    namespace App\Http\Controllers\DB;

    use App\Http\Controllers\Controller;
    use App\Models\ResiduosChe;
    use App\Models\Veiculo;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class ResiduosCheController extends Controller
    {
        public function store(Request $request)
        {
            // Validação dos campos
            $validated = $request->validate([
                'placa_veiculo' => 'nullable|string',
                'peso_inicial' => 'required|numeric',
                'data_armazenamento' => 'required|date',
                'material' => 'nullable|numeric',
                'subtitulo_material' => 'nullable|numeric',
                'id_responsavel' => 'nullable|numeric|exists:users,id',
                'tipo_registro' => 'required|string|in:entrada',
                'id_filial_input' => 'nullable|numeric|exists:filials,id_fil',
            ]);

            // Criar e salvar
            $reseduo = new ResiduosChe();
            $reseduo->id_filial = $validated['id_filial_input'] ?? null;
            $reseduo->peso = $validated['peso_inicial'];
            $reseduo->data_hora = $validated['data_armazenamento'];
            $reseduo->id_resd = $validated['material'] ?? null;
            $reseduo->id_sub_resd = $validated['subtitulo_material'] ?? null;
            $reseduo->id_responsavel = $validated['id_responsavel'] ?? null;
            $reseduo->tipo_registro = $validated['tipo_registro'];

            if (!empty($validated['placa_veiculo'])) {
                $veiculo = Veiculo::where('placa', $validated['placa_veiculo'])->first();
                $reseduo->id_vec = $veiculo?->id_vec;
            } else {
                $reseduo->id_vec = null;
            }

            $reseduo->save();
        
            return redirect()->route('registros.index')->with('success', 'Ação realizada com sucesso!');
        }
    }
?>