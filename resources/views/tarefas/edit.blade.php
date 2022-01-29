@extends('layouts.admin')

@section('conteudo') 

    <h1>Editar</h1>  

    @if($errors->any())
        @foreach ($errors->all() as $item)
            {{$item}} <br>
        @endforeach
    @endif
    
    <form method="POST">
        @csrf

        <label>
            Titulo:
            <input type="text" name="titulo" value="{{$data->titulo}}"/>
        </label>
        
        <input type="submit" value="Salvar"/>

    </form>

@endsection