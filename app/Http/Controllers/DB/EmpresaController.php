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
        $validated = $request->validate([
            'id_temp' => 'nullable|numeric|exists:tipo_empresas,id_temp',
            'nome_fans' => 'required|string|max:255', // ← agora é obrigatório
            'razao_social'  => 'nullable|string|max:255',
            'cnpj' => 'nullable|string|max:20',
            'ie' => 'nullable|string|max:20',
            'im' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string|max:20',
            'id_log' => 'nullable|numeric',
            'nome' => 'nullable|string|max:255'
        ]);

        $filial = new Empresa();
        $filial->id_temp = $validated['id_temp'] ?? null;
        $filial->nome_fans = $validated['nome_fans'] ?? null;
        $filial->razao_social = $validated['razao_social'] ?? null;
        $filial->cnpj = $validated['cnpj'] ?? null;
        $filial->ie = $validated['ie'] ?? null;
        $filial->im = $validated['im'] ?? null;
        $filial->email = $validated['email'] ?? null;
        $filial->telefone = $validated['telefone'] ?? null;
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
?>