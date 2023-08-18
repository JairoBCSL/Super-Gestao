@extends('app.produto.basico')

@section('titulo-final', '- Lista')

@section('largura', 90)

@section('final')
  <table border="2" width="100%">
    <thead>
      <tr style="background-color: rgb(192,192,192)">
        <th>Produto</th>
        <th>Descrição</th>
        <th>Fornecedor</th>
        <th>Site do Fornecedor</th>
        <th>Peso</th>
        <th>Id da Unidade</th>
        <th>Comprimento</th>
        <th>Altura</th>
        <th>Largura</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produtos as $produto)
        <tr style="background-color: rgb(224,224,224)">
          <td>{{$produto->nome}}</td>
          <td>{{$produto->descricao}}</td>
          <td>{{$produto->fornecedor->nome}}</td>
          <td>{{$produto->fornecedor->site}}</td>
          <td>{{$produto->peso}}</td>
          <td>{{$produto->unidade->nome}}</td>
          <td>{{$produto->produtoDetalhe->comprimento ?? ''}}</td>
          <td>{{$produto->produtoDetalhe->altura ?? ''}}</td>
          <td>{{$produto->produtoDetalhe->largura ?? ''}}</td>
          <td><a href="{{route('produto.show', $produto->id)}}">Visualizar</a></td>
          <td><a href="{{route('produto.edit', $produto)}}">Editar</a></td>
          <td>
            <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
            </form>
          </td>
        </tr>
        <tr>
          <td colspan="100%">
            <strong>Pedidos do produto</strong>
            <table border="1" width="100%">
              <thead>
                <tr>
                  <th>ID do Pedido</th>
                  <th>ID do Cliente</th>
                  <th>Nome do Clinete</th>
                  <th>Quantidade</th>
                  <th>Data</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produto->pedidos as $pedido)
                  <tr>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->cliente_id}}</td>
                    <td>{{$pedido->cliente->nome}}</td>
                    <td>{{$pedido->pivot->quantidade}}</td>
                    <td>{{\Carbon\Carbon::parse($pedido->pivot->updated_at)->format('d/m/Y')}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <br><br><br>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$produtos->appends($request)->links()}}
  <br>
  <p>Número de registros por página: {{$produtos->count()}}</p>
  <p>Total de registros: {{$produtos->total()}}</p>
  <p>Número do primeiro registro da página: {{$produtos->firstItem()}}</p>
  <p>Número do último registro da página: {{$produtos->lastItem()}}</p>
@endsection