<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    //Cadastrar
    public function store(Request $request)
    {
        // Validação de todos os campos
        $validated = $request->validate([
            'id_emp' => 'nullable|numeric|exists:empresas,id_emp',
            'nome' => 'required|string|unique:filials,nome',

            // Campos do endereço
            'log_filial' => 'required|string',
            'numero_filial' => 'required|numeric',
            'mun_filial' => 'required|numeric|exists:municipios,id_mun',
            'uf_filial' => 'required|numeric|exists:estados,id_est',
        ]);

        // Criação do endereço
        $endereco = new Endereco();
        $endereco->logradouro = $validated['log_filial'];
        $endereco->numero = $validated['numero_filial'];
        $endereco->id_mun = $validated['mun_filial'];
        $endereco->id_est = $validated['uf_filial'];
        $endereco->save();

        // Criação da filial
        $filial = new Filial();
        $filial->id_emp = $validated['id_emp'];
        $filial->id_log = $endereco->id_log;
        $filial->nome = $validated['nome'];
        $filial->save();

        return redirect()->back()->with('success', 'Filial cadastrada com sucesso.');
    }


    //Atualizar
    public function update(Request $request, $id)
    {
        $filial = Filial::findOrFail($id);

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
        $filial = Filial::findOrFail($id);
        $filial->delete();

        return redirect()->back()->with('success', 'Filial removida com sucesso.');
    }
}
?>