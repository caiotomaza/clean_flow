<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function page(){
        return view("relatorios.index");
    }
}
