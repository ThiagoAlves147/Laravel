<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function login(){
        return view('login');
    }

    public function loginAction(Request $request){
        $request -> validate([
            'email' => ['required', 'email'],
            'senha' => ['required']
        ]);

        $info = $request -> only('email', 'senha');

        if(Auth::attempt($info)){
            $request -> session() -> regenerate();
            return redirect() -> route('tarefas.index');

            //return redirect()->intended('dashboard');
            //return redirect()->intended('tarefas.index');
        }

        return redirect()-> route('cadastro');
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function cadastroAction(Request $request){
        $request -> validate([
            'nome' => ['required', 'string'],
            'email' => ['required', 'email'],
            'senha' => ['required', 'min:6'],
            'senhaC' => ['required', 'same:senha']
        ]);

        $sql = User::create([
            'nome' => $request -> nome,
            'email' => $request -> email,
            'senha' => Hash::make($request -> senha)
        ]);

        Auth::login($sql);

        return redirect() -> route('tarefas.index');
    }

    public function logout(){
        Auth::logout();
        return redirect() -> route('login');
    }

    public function index(Request $request){
        //all, query, input
        //filled, missing, has
        //only, exeption
        //$data = $request -> query('cidade', 'Manhuaçu');
        //$nome = $request -> input('nome', 'Visitante');
        //$nome = "Thiago Alves";
        //$idade = 16;

        $lista = [
            'farinha',
            'ovo,',
            'leite'
        ];

        $dados = [
            'lista' => $lista
        ];

        return view("admin.config", $dados);
    }

    public function info(){
        echo "INFORMAÇÕES 4";
    }

    public function perm(){
        echo "PERMISSÕES 4";
    }
}
