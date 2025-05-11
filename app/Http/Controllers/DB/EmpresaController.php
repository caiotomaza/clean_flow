<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //Cadastrar
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'id_temp' => 'nullable|numeric|exists:empresa,id_emp', 
            'nome_fans' => 'nullable|numeric|exists:empresa,id_emp', 
            'razao_social'  => 'nullable|numeric|exists:empresa,id_emp', 
            'cnpj' => 'nullable|numeric|exists:empresa,id_emp', 
            'ie' => 'nullable|numeric|exists:empresa,id_emp', 
            'im' => 'nullable|numeric|exists:empresa,id_emp', 
            'email' => 'nullable|numeric|exists:empresa,id_emp', 
            'telefone' => 'nullable|numeric|exists:empresa,id_emp'
        ]);

        // Criar
        $filial = new Empresa();
        $filial->id_emp = $validated['id_emp'];
        $filial->id_log = $validated['id_log'];
        $filial->nome = $validated['nome'];
        $filial->save();

        return redirect()->back()->with('success', 'Filial cadastrada com sucesso.');
    }

    //Atualizar
    public function update(Request $request, $id)
    {
        $filial = Empresa::findOrFail($id);

        // Validação
        $validated = $request->validate([
            'id_emp' => 'nullable|numeric|exists:empresa,id_emp',
            'id_log' => 'nullable|numeric|exists:endereco,id_log',
            'nome' => 'required|string|unique:filial,nome',
        ]);

        $filial->id_emp = $validated['id_emp'];
        $filial->id_log = $validated['id_log'];
        $filial->nome = $validated['nome'];
        $filial->save();

        return redirect()->back()->with('success', 'Filial atualizada com sucesso.');
    }

    //Deletar
    public function destroy($id)
    {
        $filial = Empresa::findOrFail($id);
        $filial->delete();

        return redirect()->back()->with('success', 'Filial removida com sucesso.');
    }
}
