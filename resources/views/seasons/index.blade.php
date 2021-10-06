@extends('layout')


@section('cabecalho')
    Temporadas de {{ $serie->name }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/seasons/{{ $season->id }}/episodes">
                    Temporada {{ $season->numero }}
                </a>
                <span class="badge badge-danger" style="color: #ffffff; background-color: #1d2124">
                   {{ $season->getEpisodesWatched()->count() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
