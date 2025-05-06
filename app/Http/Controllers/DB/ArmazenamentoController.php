<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use Illuminate\Http\Request;

class ArmazenamentoController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos campos
        $validated = $request->validate([
            'container' => 'required|string',
            'peso' => 'required|numeric',
            'data_hora' => 'required|date',
            'material' => 'nullable|numeric',
            'subtitulo_material' => 'nullable|numeric',
            'tipo_registro' => 'required|string|in:entrada,armazenamento',
        ]);
    
        // Criar e salvar
        $armazenamento = new Armazenamento();

        $armazenamento->container = $validated['container'];
        $armazenamento->peso = $validated['peso'];
        $armazenamento->data_hora = $validated['data_hora'];        
        $armazenamento->id_resd = $validated['material'] ?? null;
        $armazenamento->id_sub_resd = $validated['subtitulo_material'] ?? null;
        $armazenamento->tipo_registro = $validated['tipo_registro'];

        $armazenamento->save();
    
        return redirect()->back()->with('success', 'Resíduo Armazenado com sucesso.');
    }
}
