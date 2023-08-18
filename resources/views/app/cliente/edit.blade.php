@extends('app.cliente.basico')

@section('titulo-final', ' - Editar')

@section('largura', 30)

@section('final')
  @component('app.cliente._components.form_create_edit', ['cliente' => $cliente])
  @endcomponent
@endsection