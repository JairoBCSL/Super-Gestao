@extends('app.cliente.basico')

@section('titulo-final', '- Lista')

@section('largura', 90)

@section('final')
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>Nome</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clientes as $cliente)
        <tr>
          <td>{{$cliente->nome}}</td>
          <td><a href="{{route('pedido.create')}}">Adicionar Pedido</a></td>
          <td><a href="{{route('cliente.show', $cliente->id)}}">Pedidos</a></td>
          <td><a href="{{route('cliente.edit', $cliente)}}">Editar</a></td>
          <td>
            <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$clientes->appends($request)->links()}}
  <br>
  <p>Número de registros por página: {{$clientes->count()}}</p>
  <p>Total de registros: {{$clientes->total()}}</p>
  <p>Número do primeiro registro da página: {{$clientes->firstItem()}}</p>
  <p>Número do último registro da página: {{$clientes->lastItem()}}</p>

@endsection