<?php

namespace App\Http\Controllers;

use \App\Models\Produto;
use \App\Models\ProdutoDetalhe;
use \App\Models\Fornecedor;
use \App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['fornecedores' => $fornecedores, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = '';

        if($request->input('_token') != ''){

            $regras = [
                'fornecedor_id' => 'required|exists:fornecedores,id',
                'nome' => 'required|min:3|max:100',
                'descricao' => 'required|min:3|max:2000',
                'peso' => 'required|integer',
                'unidade_id' => 'required|exists:unidades,id'
            ];

            $feedbacks = [
                'required' => 'Campo obrigatório',
                'min' => 'O campo precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo precisa ter no máximo 100 caracteres',
                'descricao.max' => 'O campo precisa ter no máximo 2000 caracteres',
                'peso.integer' => 'O campo precisa receber um valor inteiro',
                'unidade_id' => 'A unidade de medida informada não existe',
                'fornecedor_id' => 'O fornecedor informado não existe'
            ];

            $request->validate($regras, $feedbacks);

            if($request->input('id') == ''){
            
                Produto::create($request->all());

                $msg = 'Produto adicionado com sucesso!';
            
            }
        }

        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['fornecedores' => $fornecedores, 'msg' => $msg, 'unidades' => $unidades]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        if(isset($produto)){
            return view('app.produto.show', ['produto' => $produto]);       
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['fornecedores' => $fornecedores, 'produto' => $produto, 'unidades' => $unidades]); 
        //return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $msg = '';

        if($request->input('_token') != ''){

            $regras = [
                'nome' => 'required|min:3|max:100',
                'descricao' => 'required|min:3|max:2000',
                'peso' => 'required|integer',
                'unidade_id' => 'required|exists:unidades,id'
            ];

            $feedbacks = [
                'required' => 'Campo obrigatório',
                'min' => 'O campo precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo precisa ter no máximo 100 caracteres',
                'descricao.max' => 'O campo precisa ter no máximo 2000 caracteres',
                'peso.integer' => 'O campo precisa receber um valor inteiro',
                'unidade_id' => 'A unidade de medida informada não existe'
            ];

            $request->validate($regras, $feedbacks);

            if($request->input('_token') != '' && $request->input('id') != ''){
                $produto = Produto::find($request->input('id'));
                $update = $produto->update($request->all());
                $msg = $update?'Update feito com sucesso!':'Erro ao atualizar o registro.';
            }
        }

        return view('app.produto.show', ['produto' => $produto, 'msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $msg = '';

        if(isset($produto)){
            $delete = $produto->delete();
            if($delete){
                $msg = 'Registro deletado com sucesso';
            }else{
                $msg = 'Erro ao deletar registro';
            }            
        }else{
            $msg = 'O registro que você quer deletar não existe';
        } 

        return redirect()->route('produto.index');
        
    }
}
