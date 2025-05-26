<?php
    namespace App\Http\Controllers\DB;

    use App\Http\Controllers\Controller;
    use App\Models\Municipio;
    use App\Models\Estado;
    use Illuminate\Http\Request;

    class MunicipioController extends Controller
    {
        // Listar
        public function index()
        {
            $municipios = Municipio::all();
            $estados = Estado::all();
            return view('cadastros.index', compact('municipios', 'estados'));
        }

        // Cadastrar
        public function store(Request $request)
        {
            $validated = $request->validate([
                'id_est' => 'required|numeric|exists:estados,id_est',
                'nome' => 'required|string|unique:municipios,nome',
            ]);

            Municipio::create($validated);

            return redirect()->back()->with('success', 'Município cadastrado com sucesso.');
        }

        // Atualizar
        public function update(Request $request, $id)
        {
            $municipio = Municipio::findOrFail($id);

            $validated = $request->validate([
                'id_est' => 'required|numeric|exists:estados,id_est',
                'nome' => 'required|string|unique:municipios,nome,' . $id . ',id_mun',
            ]);

            $municipio->update($validated);

            return redirect()->back()->with('success', 'Município atualizado com sucesso.');
        }

        // Deletar
        public function destroy($id)
        {
            $municipio = Municipio::findOrFail($id);
            $municipio->delete();

            return redirect()->back()->with('success', 'Município removido com sucesso.');
        }
    }
?>