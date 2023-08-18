@extends('app.pedido.basico')

@section('titulo-final', ' - Editar')

@section('largura', 30)

@section('final')
  <p>ID do Pedido: {{$pedido->id}}</p>
  <p>ID do Cliente: {{$pedido->cliente->id}}</p>
  <p>Nome do Cliente: {{$pedido->cliente->nome}}</p>
  <table border='1' style="margin-left: auto; margin-right:auto; width: 100%">
    <thead>
      <tr>
        <th>ID do Produto</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Data</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pedido->produtos as $produto)
        <tr>
          <td>{{$produto->id}}</td>
          <td>{{$produto->nome}}</td>
          <td>{{$produto->pivot->quantidade}}</td>
          <td>{{\Carbon\Carbon::parse($produto->pivot->updated_at)->format('d/m/Y')}}</td>
          <td>
            <form id="form_{{$produto->pivot->id}}" action="{{route('pedido_produto.destroy', $produto->pivot->id)}}" method="POST">
              @method('DELETE')
              @csrf
              <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <form action="{{route('pedido_produto.store')}}" method="post">
    @csrf
    <input type="hidden" name="pedido_id" value="{{$pedido->id ?? ''}}">
    <input type="hidden" name="id" value="{{$pedido_produto->id ?? ''}}">
    <select name="produto_id">
      <option value="">--- Selecione um produto ---</option>
      @foreach ($produtos as $produto)
        <option value="{{$produto->id}}">{{$produto->nome}}</option>    
      @endforeach
    </select>
    <input type="number" name="quantidade" value="{{$pedido_produto->quantidade ?? 1}}">
    {{$errors->has('produto_id')?$errors->first('produto_id'):''}}
    <button type="submit" class="borda-preta">Adicionar</button>
  </form>
@endsection