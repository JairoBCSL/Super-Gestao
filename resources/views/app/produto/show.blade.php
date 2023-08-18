@extends('app.produto.basico')

@section('titulo-final', '- Lista')

@section('largura', 30)

@section('final')
  {{isset($msg)?$msg:''}}
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>Campo</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody style="text-align: start;">
      <tr>
        <td>ID</td>
        <td>{{$produto->id}}</td>
      </tr>
      <tr>
        <td>Produto</td>
        <td>{{$produto->nome}}</td>
      </tr>
      <tr>
        <td>Descrição</td>
        <td>{{$produto->descricao}}</td>
      </tr>
      <tr>
        <td>Peso</td>
        <td>{{$produto->peso}}</td>
      </tr>
      <tr></tr>
      <tr>
        <td>ID da Unidade</td>
        <td>{{$produto->unidade_id}}</td>
      </tr>
      <tr>
        <td>Comprimento</td>
        <td>{{$produto->produtoDetalhe->comprimento??''}}</td>
      </tr>
      <tr>
        <td>Altura</td>
        <td>{{$produto->produtoDetalhe->altura??''}}</td>
      </tr>
      <tr>
        <td>Largura</td>
        <td>{{$produto->produtoDetalhe->largura??''}}</td>
      </tr>
    </tbody>
  </table>
@endsection