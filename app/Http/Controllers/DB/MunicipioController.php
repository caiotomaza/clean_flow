<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    //Cadastrar
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'id_est' => 'nullable|numeric|exists:estados,id_est', 
            'nome' => 'nullable|string|exists:municipios,id_mun', 
        ]);

        // Criar
        $municipio = new Municipio();
        $municipio->id_est = $validated['id_est'];
        $municipio->nome = $validated['nome'];
        $municipio->save();

        return redirect()->back()->with('success', 'Municipio cadastrada com sucesso.');
    }

    //Atualizar
    public function update(Request $request, $id)
    {
        $municipio = Municipio::findOrFail($id);

        // Validação
        $validated = $request->validate([
            'id_est' => 'nullable|numeric|exists:estados,id_est', 
            'nome' => 'nullable|string|exists:municipios,id_mun', 
        ]);

        $municipio->id_est = $validated['id_est'];
        $municipio->nome = $validated['nome'];
        $municipio->save();

        return redirect()->back()->with('success', 'Municipio atualizada com sucesso.');
    }

    //Deletar
    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();

        return redirect()->back()->with('success', 'Municipio removida com sucesso.');
    }
}