<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use App\Models\Filial;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    //Cadastrar
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'id_filial' => 'nullable|numeric|exists:filial,id',
            'placa' => 'required|string|unique:veiculos,placa',
        ]);

        // Criar
        $veiculo = new Veiculo();
        $veiculo->id_filial = $validated['id_filial'];
        $veiculo->placa = $validated['placa'];
        $veiculo->save();

        return redirect()->back()->with('success', 'Veículo cadastrado com sucesso.');
    }

    //Atualizar
    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        // Validação
        $validated = $request->validate([
            'id_filial' => 'nullable|numeric|exists:filial,id',
            'placa' => 'required|string|unique:veiculos,placa,' . $veiculo->id,
        ]);

        
        $veiculo->placa = $validated['placa'];
        $veiculo->save();

        return redirect()->back()->with('success', 'Veículo atualizado com sucesso.');
    }

    //Deletar
    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->back()->with('success', 'Veículo removido com sucesso.');
    }
}