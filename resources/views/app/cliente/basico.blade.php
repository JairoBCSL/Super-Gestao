@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
  <div class="conteudo-pagina">
    <div class="titulo-pagina-2">
      <p>Clientes @yield('titulo-final')</p>
    </div>
    <div class="menu">
      <ul>
        <li><a href="{{route('cliente.create')}}">Novo</a></li>
        <li><a href="{{route('cliente.index')}}">Consulta</a></li>
      </ul>
    </div>  
    <div class="informacao-pagina">
      <div style="width: @yield('largura')%;margin-left: auto; margin-right: auto;">
        @yield('final')
      </div>
    </div>
  </div>
@endsection