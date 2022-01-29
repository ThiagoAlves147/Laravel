@extends('layouts.admin')

@section('conteudo') 

    <form method="POST">
        @csrf

        @if($errors->any())
            @foreach ($errors->all() as $item)
                {{$item}} <br>
            @endforeach
         @endif

        <label>
            Nome:<br>
            <input type="text" name="nome"/>
        </label>
        <br>
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
        <label>
            Confirmar senha:
            <br>
            <input type="password" name="senhaC"/>
        </label>
        <br>
        <input type="submit" value="Enviar"/>
    </form>
    <br>

@endsection