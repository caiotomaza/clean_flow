<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\reseduos_sai;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ReseduosSaiController extends Controller
{
 public function store(Request $request)
    {
        // Validação dos campos
        $validated = $request->validate([
            'id_saida' => 'required|numeric|unique:reseduos_sais,id_saida',
            'id_filial_sai' => 'required|numeric|exists:filials,id_fil',
            'id_arm' => 'nullable|numeric|exists:armazenamentos,id_arm',
            'id_vec' => 'nullable|string',
            'data_hora' => 'required|date',
        ]);

        $saida = new reseduos_sai();
        $saida->id_saida = $validated['id_saida'];
        $saida->id_filial = $validated['id_filial_sai'];
        $saida->id_arm = $validated['id_arm'] ?? null;
        $saida->data_hora = $validated['data_hora'];

        // Lógica para buscar o veículo pela placa e salvar o ID
        if ($request->filled('id_vec')) {
            $veiculo = Veiculo::where('placa', $request->input('id_vec'))->first();
            $saida->id_vec = $veiculo?->id_vec;
        } else {
            $saida->id_vec = null;
        }

        $saida->tipo_registro = 'saidas';

        $saida->save();

        return redirect()->back()->with('success', 'Saída de resíduo registrada com sucesso.');
    }
}
