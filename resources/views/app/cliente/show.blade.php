@extends('app.cliente.basico')

@section('titulo-final', '- Registro')

@section('largura', 30)

@section('final')
  {{isset($msg)?$msg:''}}
  <p>ID do Cliente: {{$cliente->id}}</p>
  <p>Nome: {{$cliente->nome}}</p>
  <h4>Pedidos</h4>
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>ID do Pedido</th>
        <th>Data de Criação</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody style="text-align: start;">
      @foreach($cliente->pedidos as $pedido)
        <tr>
          <td>{{$pedido->id}}</td>
          <td>{{$pedido->created_at}}</td>
          <td><a href="{{route('pedido.edit', $pedido)}}">Editar</a></td>
          <td>
            <form id="form_{{$pedido->id}}" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection