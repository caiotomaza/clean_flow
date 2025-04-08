<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function page(){
        return view("entrada.index");
    }
}
