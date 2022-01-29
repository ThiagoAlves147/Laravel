<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{
    public function __invoke()
    {
        //$lista = Tarefa::all();

        $lista = Tarefa::find(3);
        //$lista->titulo = 'Dormir alterado';
        //$lista->save();

        echo $lista->titulo;
        
        //return view("welcome");
    }
}
