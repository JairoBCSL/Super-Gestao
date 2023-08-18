@extends('app.cliente.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  @component('app.cliente._components.form_create_edit')
  @endcomponent
@endsection