<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function index(){
        $lista = Tarefa::all();

        return view('tarefas.index',[
            'lista' => $lista
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        $request -> validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request -> input('titulo');
        $sql = new Tarefa;

        $sql -> titulo = $titulo;
        $sql -> save();

        return redirect() -> route('tarefas.index');
    }

    public function edit($id){
        $sql = Tarefa::find($id);

        if($sql){
            return view('tarefas.edit',[
                'data' => $sql
            ]);
        }
        else{
            return redirect() -> route('tarefas.index');
        }
    }

    public function editAction(Request $request, $id){
        $request -> validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request -> input('titulo');

        $sql = Tarefa::find($id);
        $sql -> titulo = $titulo;
        $sql -> save();

        return redirect() -> route('tarefas.index');
    }

    public function delete($id){
        $sql = Tarefa::find($id) -> delete();
        return redirect() -> route('tarefas.index');
    }

    public function done($id){
        $sql = Tarefa::find($id);
        if($sql){
            $sql -> resolvido = 1 - $sql -> resolvido;
            $sql -> save();
        }

        return redirect() -> route('tarefas.index');
    }
}

/*

public function index(){
        $lista = DB::select('SELECT * FROM tarefas');

        return view('tarefas.index', [
            'lista' => $lista
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        $request -> validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request -> input('titulo');

        DB::insert('INSERT INTO tarefas(titulo) VALUES(:titulo)', [
            'titulo' => $titulo
        ]);

        return redirect() -> route('tarefas.index');

        //return redirect() -> route('tarefas.add') -> with('status', 'Você não preeencheu o titulo');
    }

    public function edit($id){
        $data = DB::select('SELECT * FROM tarefas WHERE id=:id', [
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);
        }
        else{
            return redirect() -> route('tarefas.index');
        }
        
    }

    public function editAction(Request $request, $id){
        $request -> validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request -> input('titulo');

        $data = DB::select('SELECT * FROM tarefas WHERE id=:id', [
            'id' => $id
        ]);

        if(count($data) > 0){
            DB::update('UPDATE tarefas SET titulo=:titulo WHERE id=:id', [
                'titulo' => $titulo,
                'id' => $id
            ]);
        }

        return redirect() -> route('tarefas.index');
    }

    public function delete($id){
        $sql = DB::delete('DELETE FROM tarefas WHERE id=:id',[
            'id' => $id
        ]);

        return redirect() -> route('tarefas.index');
    }

    public function done($id){
        DB::update('UPDATE tarefas SET resolvido=1 - resolvido WHERE id=:id',[
            'id' => $id
        ]);

        return redirect() -> route('tarefas.index');
    }

    */
