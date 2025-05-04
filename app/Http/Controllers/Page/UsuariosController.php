<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function page(){
        $usuarios = User::paginate(10);
        return view("usuarios.index", compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'matricula' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'matricula' => 'required|string|unique:users,matricula,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $usuarios = User::findOrFail($id);
        $usuarios->name = $request->name;
        $usuarios->cpf = $request->cpf;
        $usuarios->email = $request->email;

        if ($request->filled('password')) {
            $usuarios->password = bcrypt($request->password);
        }

        $usuarios->save();

        return redirect()->back()->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('sucess', 'Usuário deletado com sucesso!');

    }

}
