<?php

    namespace App\Http\Controllers\DB;

    use App\Http\Controllers\Controller;
    use App\Models\Endereco;
    use Illuminate\Http\Request;

    class EnderecoController extends Controller
    {
        //Cadastrar
        public function store(Request $request)
        {
            $validated = $request->validate([
                'id_mun' => 'required|numeric|exists:municipios,id_mun',
                'id_est' => 'required|numeric|exists:estado,id_est',
                'logradouro' => 'required|string',
                'numero'  => 'required|numeric',
            ]);

            $endereco = new Endereco();
            $endereco->id_mun = $validated['id_mun'];
            $endereco->id_est = $validated['id_est'];
            $endereco->logradouro = $validated['logradouro'];
            $endereco->numero = $validated['numero'];
            $endereco->save();

            return redirect()->back()->with('success', 'Endereço cadastrado com sucesso.');
        }

        //Atualizar
        public function update(Request $request, $id)
        {
            $endereco = Endereco::findOrFail($id);

            // Validação
            $validated = $request->validate([
                'id_mun' => 'nullable|numeric|exists:empresa,id_emp',
                'logradouro' => 'nullable|numeric|exists:endereco,id_log',
                'numero' => 'required|string|unique:filial,nome',
            ]);

            $endereco->id_mun = $validated['id_mun'];
            $endereco->logradouro = $validated['logradouro'];
            $endereco->numero = $validated['numero'];
            $endereco->save();

            return redirect()->back()->with('success', 'Endereço atualizada com sucesso.');
        }

        //Deletar
        public function destroy($id)
        {
            $endereco = Endereco::findOrFail($id);
            $endereco->delete();

            return redirect()->back()->with('success', 'Endereço removida com sucesso.');
        }
    }
?>