@extends('layouts.admin')

@section('conteudo') 
    

<h1>Configurações</h1>

<ul>
    @foreach($lista as $item)
        <li> {{$item}} </li>
    @endforeach
</ul>

<form method="POST">
    @csrf

    Nome:
    <br>
    <input type="text" name="nome"/>
    <br>

    Idade:
    <br>
    <input type="number" name="idade"/>
    <br>

    Cidade:
    <br>
    <input type="text" name="cidade"/>
    <br>

    <input type="submit" value="Enviar"/>
</form>

@endsection

<a href="/config/info">INFORMAÇÕES</a>

<br>

<a href="/config/per">PERMISSÕES</a>