@extends('app.fornecedor.basico')

@section('titulo-final', '')

@section('largura', 30)

@section('final')
  <form action="{{route('app.fornecedor.listar')}}" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
    <input type="text" name="site" placeholder="Site" class="borda-preta">
    <input type="text" name="uf" placeholder="UF" class="borda-preta">
    <input type="text" name="email" placeholder="E-mail" class="borda-preta">
    <button type="submit" class="borda-preta">Pesquisar</button>
  </form>
@endsection