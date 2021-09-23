@extends('layout')


@section('cabecalho')
    Series
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$serie->name}}
        <form method="post" action="/series/remover/{{ $serie->id }}"
            onsubmit="return confirm('Tem certeza que deseja excluir a serie {{ addslashes($serie->name) }}')">
            @csrf
            <button class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
