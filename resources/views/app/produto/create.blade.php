@extends('app.produto.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  {{isset($msg)?$msg:''}}
  <form action="{{route('produto.store')}}" method="post">
    @csrf

    <select name="fornecedor_id">
      <option value="">--- Selecione um Fornecedor ---</option>
      @foreach ($fornecedores as $f)
        <option value="{{$f->id}}">{{$f->nome}}</option>    
      @endforeach
    </select>
    {{$errors->has('fornecedor_id')?$errors->first('fornecedor_id'):''}}
    <input type="hidden" name="id" value="{{$produto->id ?? ''}}">
    <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
    {{$errors->has('nome')?$errors->first('nome'):''}}
    <input type="text" name="descricao" value="{{$produto->descricao ?? old('descricao')}}" placeholder="Desrição" class="borda-preta">
    {{$errors->has('descricao')?$errors->first('descricao'):''}}
    <input type="text" name="peso" value="{{$produto->peso ?? old('peso')}}" placeholder="Peso" class="borda-preta">
    {{$errors->has('peso')?$errors->first('peso'):''}}
    <select name="unidade_id">
      <option value="">Selecione a unidade de medida</option>
      @foreach ($unidades as $u)
        <option value="{{$u->id}}" {{($u->id==old('unidade_id')?'selected':'')}}>{{$u->unidade}}</option>    
      @endforeach
    </select>
    {{$errors->has('unidade_id')?$errors->first('unidade_id'):''}}
    <button type="submit" class="borda-preta">Cadastrar</button>
  </form>
@endsection