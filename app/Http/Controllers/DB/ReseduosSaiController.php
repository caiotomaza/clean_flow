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
    public function create()
    {
        return view('reseduos_sais.create', [
            'armazenamentos' => Armazenamento::all(),
            'placas' => Veiculo::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_saida' => 'required|integer|unique:reseduos_sais,id_saida',
            'id_arm' => 'nullable|exists:armazenamentos,id_arm',
            'id_vec' => 'nullable|exists:veiculos,id_vec',
            'data_hora' => 'required|date',
        ]);

        reseduos_sai::create($validated);

        return redirect()->route('reseduos_sais.index')->with('success', 'Registro criado com sucesso.');
    }
}
