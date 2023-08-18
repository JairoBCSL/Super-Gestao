@extends('app.pedido.basico')

@section('titulo-final', '- Lista')

@section('largura', 90)

@section('final')
  {{isset($msg)?$msg:''}}
  <p>ID do Pedido: {{$pedido->id}}</p>
  <p>ID do Cliente: {{$pedido->cliente->id}}</p>
  <p>Nome do Cliente: {{$pedido->cliente->nome}}</p>
  @if (isset($pedido->produtos))
    <table border='1' style="margin-left: auto; margin-right:auto">
      <thead>
        <tr>
          <th>ID do Produto</th>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Data de Criação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pedido->produtos as $produto)
          <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->pivot->quantidade}}</td>
            <td>{{$produto->pivot->created_at}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
   
@endsection