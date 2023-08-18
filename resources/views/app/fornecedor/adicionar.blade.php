@extends('app.fornecedor.basico')

@section('titulo-final', '- Adicionar')

@section('largura', 30)

@section('final')
  {{isset($msg)?$msg:''}}
  <form action="{{route('app.fornecedor.adicionar')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
    <input type="text" name="nome" value="{{$fornecedor->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
    {{$errors->has('nome')?$errors->first('nome'):''}}
    <input type="text" name="site" value="{{$fornecedor->site ?? old('site')}}" placeholder="Site" class="borda-preta">
    {{$errors->has('site')?$errors->first('site'):''}}
    <input type="text" name="uf" value="{{$fornecedor->uf ?? old('uf')}}" placeholder="UF" class="borda-preta">
    {{$errors->has('uf')?$errors->first('uf'):''}}
    <input type="text" name="email" value="{{$fornecedor->email ?? old('email')}}" placeholder="E-mail" class="borda-preta">
    {{$errors->has('email')?$errors->first('email'):''}}
    <button type="submit" class="borda-preta">Cadastrar</button>
  </form>
@endsection