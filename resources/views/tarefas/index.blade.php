@extends('layouts.admin')

@section('conteudo') 

    <h1>Listagem</h1>   
    
    <a href=" {{route('tarefas.add')}} ">Adicionar nova tarefa</a>

    @if(count($lista) > 0)

        <ul>
            @foreach($lista as $item)
                <li>
                    <a href=" {{ route('tarefas.done', ['id' => $item->id]) }} ">
                        [
                            @if($item->resolvido === 1)
                                Desmarcar
                            @else
                                Marcar
                            @endif
                        ]
                    </a>
                    {{$item->titulo}}
                    <a href=" {{ route('tarefas.edit', ['id' => $item->id]) }} " >[ Editar ]</a>
                    <a href=" {{ route('tarefas.delete', ['id' => $item->id]) }} " > [ Excluir ]</a>

                </li>
            @endforeach
        </ul>

    @else
        Sem itens a serem listados
    @endif

    <a href= "{{route('logout')}}" >Sair</a>

@endsection
