<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pedido;
use \App\Models\Produto;
use \App\Models\PedidoProduto;
use \App\Models\Cliente;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);

        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        
        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id',

        ];

        $feedbacks = [
            'cliente_id' => 'O cliente não existe'
        ];

        $request->validate($regras, $feedbacks);

        Pedido::create($request->all());

        return redirect()->route('cliente.show', ['cliente' => $request->get('cliente_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        if(isset($pedido)){
            return view('app.pedido.show', ['pedido' => $pedido]);
        }else{
            return redirect()->route('pedido.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $msg = '';
        $pedido = Pedido::find($id);

        if(isset($pedido)){
            $clientes = Cliente::all();
            $produtos = Produto::all();
            return view('app.pedido.edit', ['produtos' => $produtos, 'msg' => $msg, 'pedido' => $pedido]);
        }else{
            $msg = 'Pedido não localizado';
            $pedidos = Pedido::paginate(10);
            return view('app.pedido.index', ['msg' => $msg, 'pedidos' => $pedidos, 'request' => $request->all()]);
        }
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
        print_r($request->all());

        $regras = [
            'cliente_id' => 'exists:clientes,id',

        ];

        $feedbacks = [
            'cliente_id' => 'O cliente não existe'
        ];

        $request->validate($regras, $feedbacks);

        if($request->input('_token') != '' && $request->input('id') != ''){
            $pedido = Pedido::find($request->input('id'));
            $update = $pedido->update($request->all());
            $msg = $update?'Update feito com sucesso!':'Erro ao atualizar o registro.';
        }

        return redirect()->route('pedido.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $msg = '';

        if(isset($pedido)){
            $pedidos_produtos = PedidoProduto::all()->where('pedido_id', $pedido->id);
            $delete = true;
            foreach ($pedidos_produtos as $pedido_produto) {
                $delete = $pedido_produto->delete() && $delete;
            }
            $delete = $pedido->delete() && $delete;
            if($delete){
                $msg = 'Registro deletado com sucesso';
            }else{
                $msg = 'Erro ao deletar registro';
            }            
        }else{
            $msg = 'O registro que você quer deletar não existe';
        } 

        return redirect()->route('pedido.index');
    }
}
