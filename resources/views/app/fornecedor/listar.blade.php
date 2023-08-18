@extends('app.fornecedor.basico')

@section('titulo-final', '- Lista')

@section('largura', 90)

@section('final')
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>Fornecedor</th>
        <th>Site</th>
        <th>UF</th>
        <th>E-mail</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fornecedores as $f)
        <tr>
          <td>{{$f->nome}}</td>
          <td>{{$f->site}}</td>
          <td>{{$f->uf}}</td>
          <td>{{$f->email}}</td>
          <td><a href="{{route('app.fornecedor.excluir', $f->id)}}">Excluir</a></td>
          <td><a href="{{route('app.fornecedor.editar', $f->id)}}">Editar</a></td>
        </tr>
        <tr>
          <td colspan="6">
            <p>Lista de produtos</p>
            <table border='1' style="margin: 20px;">
              <thead>
                <tr>
                  <th>ID do Produto</th>
                  <th>Nome do Produto</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($f->produtos as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nome}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$fornecedores->appends($request)->links()}}
  <br>
  <p>Número de registros por página: {{$fornecedores->count()}}</p>
  <p>Total de registros: {{$fornecedores->total()}}</p>
  <p>Número do primeiro registro da página: {{$fornecedores->firstItem()}}</p>
  <p>Número do último registro da página: {{$fornecedores->lastItem()}}</p>

@endsection