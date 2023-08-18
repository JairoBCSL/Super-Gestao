@if (isset($pedido->id))
  <form action="{{route('pedido.update', ['pedido' => $pedido->id])}}" method="post">
    @csrf    
    @method('PUT')
@else
  <form action="{{route('pedido.store')}}" method="post">
    @csrf
@endif
    <input type="hidden" name="id" value="{{$pedido->id ?? ''}}">
    <select name="cliente_id">
      <option value="">--- Selecione um cliente ---</option>
      @foreach ($clientes as $cliente)
        <option value="{{$cliente->id}}" {{($cliente->id == ($pedido->cliente_id??''))?'selected':''}}>{{$cliente->nome}}</option>    
      @endforeach
    </select>
    <button type="submit" class="borda-preta">Cadastrar</button>
  </form>