@extends('layout')


@section('cabecalho')
    Temporadas de {{ $serie->name }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item">
              Temporada {{ $season->numero }}
            </li>
        @endforeach
    </ul>
@endsection
