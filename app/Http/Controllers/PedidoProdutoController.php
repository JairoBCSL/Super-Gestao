<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Cliente;
use \App\Models\Pedido;
use \App\Models\Produto;
use \App\Models\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $msg = '';
        if(isset($pedido)){
            $produtos = Produto::all();
            return view('app.pedido_produto.create', ['msg' => $msg, 'pedido' => $pedido, 'produtos' => $produtos]);
        }else{
            return redirect()->route('pedido.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $msg = '';
        $regras = [
            'pedido_id' => 'exists:pedidos,id',
            'produto_id' => 'exists:produtos,id'
        ];

        $feedbacks = [
            'pedido_id.exists' => 'O pedido não existe',
            'produto_id.exists' => 'O produto não existe'
        ];

        $request->validate($regras, $feedbacks);

        $pesquisa = PedidoProduto::all()
            ->where('pedido_id', '=', $request->get('pedido_id'))
            ->where('produto_id', '=', $request->get('produto_id'))
            ->first();

        

        if($request->input('_token') != ''){

            if(isset($pesquisa->id)){
                $pedido_produto = PedidoProduto::find($pesquisa->id);
                $pedido_produto->quantidade = $pedido_produto->quantidade + $request->input('quantidade');
            }else{
                $pedido_produto = new PedidoProduto();
                $pedido_produto->id = $request->get('id');
                $pedido_produto->produto_id = $request->get('produto_id');
                $pedido_produto->pedido_id = $request->get('pedido_id');
                $pedido_produto->quantidade = $request->get('quantidade');
            }
            $pedido_produto->save();
            $msg = 'Registro adicionado';
            /*$pedido->produtos()->attach([
                $request->get('produto_id') =>
                ['quantidade' => $request->get('quantidade'), 'pedido_id' => $pedido->id]
            ]);*/
        }
        $produtos = Produto::all();
        $pedido = Pedido::find($request->get('pedido_id'));
        return view('app.pedido.edit', ['produtos' => $produtos, 'msg' => $msg, 'pedido' => $pedido]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedido_produto)
    {
        //$pedido_produto = PedidoProduto::find($id);
        if(isset($pedido_produto)){
            $remove = $pedido_produto->delete();
            if($remove == 1)
                $msg = 'Registro deletado';
            else
                $msg = 'Erro ao deletar registro';
        }else{
            $msg = 'Registro não existe.';
        }
        $produtos = Produto::all();
        $pedido = Pedido::find($pedido_produto->pedido_id);
        if(isset($pedido) && isset($produtos))
            return view('app.pedido.edit', ['produtos' => $produtos, 'msg' => $msg, 'pedido' => $pedido]);
        else
            return route('pedido.index');
    }
}
