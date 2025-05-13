<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Filial;
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
            'id_filial_input' => 'nullable|numeric|exists:filials,id_fil',
        ]);



        // Criar e salvar
        $reseduo = new Reseduos_che();
        $reseduo->id_filial = $validated['id_filial_input'] ?? null;
        $reseduo->peso = $validated['peso_inicial'];
        $reseduo->data_hora = $validated['data_armazenamento'];
        $reseduo->id_resd = $validated['material'] ?? null;
        $reseduo->id_sub_resd = $validated['subtitulo_material'] ?? null;
        $reseduo->id_responsavel = $validated['id_responsavel'] ?? null;
        $reseduo->tipo_registro = $validated['tipo_registro'];

        if ($request->filled('id_vec')) {
            $veiculo = Veiculo::where('placa', $request->input('id_vec'))->first();
            $reseduo->id_vec = $veiculo?->id_vec;
        } else {
            $reseduo->id_vec = null;
        }
                    
        $reseduo->save();
    
        return redirect()->back()->with('success', 'Resíduo registrado com sucesso.');
    }
    
}
