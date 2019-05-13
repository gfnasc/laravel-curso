@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->nome }}
            <a href="#" class="btn btn-info">
                Abrir
            </a>
            <form action="/series/{{ $serie->id }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection