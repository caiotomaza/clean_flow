<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function page()
    {
        $usuarios = User::paginate(10);
        return view("usuarios.index", compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'matricula' => 'required|string|max:50|unique:users',
            'status' => 'required|in:ativo,inativo',
        ]);

        $validated['password'] = Hash::make('01012025');

        User::create($validated);

        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'matricula' => 'required|string|max:50|unique:users,matricula,' . $usuario->id,
            'status' => 'required|in:ativo,inativo',
        ]);

        $usuario->update($validated);

        return redirect()->back()->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
