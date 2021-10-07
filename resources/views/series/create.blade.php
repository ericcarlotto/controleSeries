@extends('layout')


@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')

   @include('errors', ['errors' => $errors])
   <form method="post">
        @csrf
        <div class="row">
        <div class="col col-8">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas">N° de temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
        <div class="col col-2">
            <label for="ep_temporada">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_temporada" id="ep_temporada">
        </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
   </form>
@endsection
