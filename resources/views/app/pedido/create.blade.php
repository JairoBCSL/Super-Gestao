@extends('app.pedido.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
  @endcomponent
@endsection