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
            <span class="d-flex">
                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form action="/series/{{ $serie->id }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </span>
        </li>
    @endforeach
</ul>
@endsection