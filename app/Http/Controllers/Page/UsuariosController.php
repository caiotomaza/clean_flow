<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function page(){
        return view("usuarios.index");
    }
}
