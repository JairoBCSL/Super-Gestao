<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);

        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
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
            'nome' => 'required:min:3|max:40'
        ];

        $feedbacks = [
            'required' => 'O campo nome deve ser preenchido',
            'min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'max' => 'O campo nome deve ter no máximo 40 caracteres'
        ];

        $request->validate($regras, $feedbacks);

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if(isset($cliente)){
            return view('app.cliente.show', ['cliente' => $cliente]);
        }else{
            $clientes = Cliente::paginate(10);
            return redirect()->route('cliente.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cliente = Cliente::find($id);

        if(isset($cliente))
            return view('app.cliente.edit', ['cliente' => $cliente]);
        else{
            $msg = '';
            $clientes = Cliente::paginate(10);
            return redirect()->route('cliente.index');
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

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') != ''){

            $regras = [
                'nome' => 'required:min:3|max:40'
            ];

            $feedbacks = [
                'required' => 'O campo nome deve ser preenchido',
                'min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'max' => 'O campo nome deve ter no máximo 40 caracteres'
            ];

            $request->validate($regras, $feedbacks);

            $cliente = Cliente::find($id);

            $update = $cliente->update($request->all());
            $update?'Update feito com sucesso!':'Erro ao atualizar o registro.';
        }
            return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $msg = '';

        $cliente = Cliente::find($id);
        if(isset($cliente)){
            $delete = $cliente->delete();
            if($delete){
                $msg = 'Cliente deletado com sucesso';
            }else{
                $msg = 'Erro ao tentar excluir o cliente';
            }
        }else{
            $msg = 'O cliente que você quer deletar não existe';
        }

        return redirect()->route('cliente.index');
    }
}
