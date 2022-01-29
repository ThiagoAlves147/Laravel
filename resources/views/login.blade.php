@extends('layouts.admin')

@section('conteudo') 
    <h1>LOGIN</h1>

    <form method="POST">
        @csrf
        <label>
            E-mail:<br>
            <input type="email" name="email"/>
        </label>
        <br>
        <label>
            Senha:
            <br>
            <input type="password" name="senha"/>
        </label>
        <br>
        <input type="submit" value="Enviar"/>
    </form>
    <br>

    <a href=" {{ route('cadastro') }} ">Cadastre-se</a>

@endsection