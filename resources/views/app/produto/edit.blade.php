@extends('app.produto.basico')

@section('titulo-final', '- Lista')

@section('largura', 30)

@section('final')
  {{isset($msg)?$msg:''}}
  <form action="{{route('produto.update', ['produto' => $produto])}}" method="post">
    @csrf
    @method('PUT')
    <select name="fornecedor_id">
      <option value="">--- Selecione um Fornecedor ---</option>
      @foreach ($fornecedores as $f)
        <option value="{{$f->id}}" {{($produto->fornecedor_id==$f->id?'selected':'')}}>{{$f->nome}}</option>    
      @endforeach
    </select>
    {{$errors->has('fornecedor_id')?$errors->first('fornecedor_id'):''}}
    <input type="hidden" name="id" value="{{$produto->id ?? ''}}">
    <input type="text" name="nome" value="{{$produto->nome ?? ''}}" placeholder="Nome" class="borda-preta">
    {{$errors->has('nome')?$errors->first('nome'):''}}
    <input type="text" name="descricao" value="{{$produto->descricao ?? ''}}" placeholder="Desrição" class="borda-preta">
    {{$errors->has('descricao')?$errors->first('descricao'):''}}
    <input type="text" name="peso" value="{{$produto->peso ?? ''}}" placeholder="Peso" class="borda-preta">
    {{$errors->has('peso')?$errors->first('peso'):''}}
    <select name="unidade_id">
      <option value="">Selecione a unidade de medida</option>
      @foreach ($unidades as $u)
        <option value="{{$u->id}}" {{($u->id==$produto->unidade_id?'selected':'')}}>{{$u->unidade}}</option>    
      @endforeach
    </select>
    {{$errors->has('unidade_id')?$errors->first('unidade_id'):''}}
    <button type="submit" class="borda-preta">Salvar</button>
  </form>
@endsection