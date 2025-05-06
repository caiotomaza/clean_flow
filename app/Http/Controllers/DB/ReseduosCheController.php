<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Reseduos_che;
use App\Models\veiculo;
use Illuminate\Http\Request;

class ReseduosCheController extends Controller
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
        ]);
    
        // Buscar veículo pela placa (pode ser null)
        $veiculo = Veiculo::where('placa', $request->input('placa_veiculo'))->first();
    
        // Criar e salvar
        $reseduo = new Reseduos_che();
        $reseduo->id_vec = $veiculo?->id_vec;
        $reseduo->peso = $validated['peso_inicial'];
        $reseduo->data_hora = $validated['data_armazenamento'];
        $reseduo->id_resd = $validated['material'] ?? null;
        $reseduo->id_sub_resd = $validated['subtitulo_material'] ?? null;
        $reseduo->id_responsavel = $validated['id_responsavel'] ?? null;
        $reseduo->tipo_registro = $validated['tipo_registro'];


        $reseduo->save();
    
        return redirect()->back()->with('success', 'Resíduo registrado com sucesso.');
    }
    
}
