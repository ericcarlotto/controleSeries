@extends('layout')


@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
<form method="post">
    @csrf
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name">
</div>

<button class="btn btn-primary">Adicionar</button>
</form>
@endsection
