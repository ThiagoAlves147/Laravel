<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", "HomeController");
Route::view("/teste", "teste");

Route::get('/login', [UserController::class, 'login']) -> name('login') -> middleware(['guest']);
Route::post('/login', [UserController::class, 'loginAction']) -> middleware(['guest']);

Route::get('/cadastro', [UserController::class, 'cadastro']) -> name('cadastro') -> middleware(['guest']);
Route::post('/cadastro', [UserController::class, 'cadastroAction']) -> middleware(['guest']);

Route::middleware(['auth']) -> group(function(){
    Route::get('/logout', [UserController::class, 'logout']) -> name('logout');

    Route::prefix("/config") -> group(function(){

        Route::get("/", [UserController::class, "index"]);
        Route::post("/", [UserController::class, "index"]);
    
        Route::get("info", [UserController::class, "info"]);
        Route::get("per", [UserController::class, "perm"]);
    
    });

    Route::prefix('/tarefas',) -> group(function(){

        Route::get('/', [TarefasController::class, 'index']) -> name('tarefas.index'); //listagem de tarefas
    
        Route::get('add', [TarefasController::class, 'add']) -> name('tarefas.add');//Tela de adição de nova tarefa
        Route::post('add', [TarefasController::class, 'addAction']);//Ação de adição de nova tarefa  
    
        Route::get('edit/{id}', [TarefasController::class, 'edit']) -> name('tarefas.edit');//Tela de edição
        Route::post('edit/{id}', [TarefasController::class, 'editAction']);//Ação de edição
    
        Route::get('delete/{id}', [TarefasController::class, 'delete']) -> name('tarefas.delete');
    
        Route::get('marcar{id}', [TarefasController::class, 'done']) -> name('tarefas.done');//Resolvido / Não resolvido
    
    });
});


/*
Route::get("/config", function(){
    //return redirect() -> route("per");

    return view("config");
});

Route::get("/config/info", function(){
    echo "Configurações INFO";
}) -> name("info") ;

Route::get("/menu/{id}", function($nome){
    echo "Nome: ".$nome;
});

Route::get("/user/{nome}", function($nome){
    echo "Mostrando o nome: ".$nome;
}) -> where("nome", "[A-z]+");

Route::get("/user/{id}", function($id){
    echo "Mostrando o id: ".$id;
});
*/
