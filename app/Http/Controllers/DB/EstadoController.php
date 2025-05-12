<?php

namespace App\Http\Controllers\DB;
use App\Models\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    //Cadastrar
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'nome' => 'nullable|string|exists:estados,id_est', 
        ]);

        // Criar
        $estado = new Estado();
        $estado->nome = $validated['nome'];
        $estado->save();

        return redirect()->back()->with('success', 'Estado cadastrada com sucesso.');
    }

    //Atualizar
    public function update(Request $request, $id)
    {
        $estado = Estado::findOrFail($id);

        // Validação
        $validated = $request->validate([
            'nome' => 'nullable|string|exists:estados,id_est',
        ]);

        $estado->nome = $validated['nome'];
        $estado->save();

        return redirect()->back()->with('success', 'Estado atualizada com sucesso.');
    }

    //Deletar
    public function destroy($id)
    {
        $municipio = Estado::findOrFail($id);
        $municipio->delete();

        return redirect()->back()->with('success', 'Estado removida com sucesso.');
    }
}
