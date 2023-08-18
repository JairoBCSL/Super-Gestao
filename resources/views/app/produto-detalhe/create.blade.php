@extends('app.produto-detalhe.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  {{isset($msg)?$msg:''}}
  @if(isset($produto_detalhe->id))
    <form action="{{route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}" method="post">
      @method('PUT')
  @else
    <form action="{{route('produto-detalhe.store')}}" method="post">
  @endif
    @csrf
    <input type="hidden" name="id" value="{{$produto_detalhe->id ?? ''}}">
    <input type="text" name="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" placeholder="ID do Produto" class="borda-preta">
    {{$errors->has('produto_id')?$errors->first('produto_id'):''}}
    <input type="text" name="comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="Comprimento" class="borda-preta">
    {{$errors->has('comprimento')?$errors->first('comprimento'):''}}
    <input type="text" name="largura" value="{{$produto_detalhe->largura ?? old('largura')}}" placeholder="Largura" class="borda-preta">
    {{$errors->has('largura')?$errors->first('largura'):''}}
    <input type="text" name="altura" value="{{$produto_detalhe->altura ?? old('altura')}}" placeholder="Altura" class="borda-preta">
    {{$errors->has('altura')?$errors->first('altura'):''}}
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