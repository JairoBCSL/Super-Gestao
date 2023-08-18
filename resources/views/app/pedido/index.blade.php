@extends('app.pedido.basico')

@section('titulo-final', '- Lista')

@section('largura', 90)

@section('final')
  {{isset($msg)?$msg:''}}
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>ID do Pedido</th>
        <th>Cliente</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pedidos as $p)
        <tr>
          <td>{{$p->id}}</td>
          <td>{{$p->cliente->nome}}</td>
          <td><a href="{{route('pedido.show', $p->id)}}">Visualizar</a></td>
          <td><a href="{{route('pedido.edit', $p)}}">Editar</a></td>
          <td>
            <form id="form_{{$p->id}}" action="{{route('pedido.destroy', ['pedido' => $p->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$pedidos->appends($request)->links()}}
  <br>
  <p>Número de registros por página: {{$pedidos->count()}}</p>
  <p>Total de registros: {{$pedidos->total()}}</p>
  <p>Número do primeiro registro da página: {{$pedidos->firstItem()}}</p>
  <p>Número do último registro da página: {{$pedidos->lastItem()}}</p>
  
@endsection