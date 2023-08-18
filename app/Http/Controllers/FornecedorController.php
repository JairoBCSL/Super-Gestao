<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor
            ::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10);  

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != ''){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf' => 'O campo UF deve ter 2 caractered',
                'email' => 'O campo email precisa ter o formato usuario@dominio'
            ];
            
            $request->validate($regras, $feedback);

            if($request->input('id') == ''){
            
                $fornecedor = new Fornecedor();
                $fornecedor->create($request->all());

                $msg = 'Fornecedor adicionado com sucesso!';
            
            }else if($request->input('_token') != '' && $request->input('id') != ''){
                $fornecedor = Fornecedor::find($request->input('id'));
                $update = $fornecedor->update($request->all());
                $msg = $update?'Update feito com sucesso!':'Erro ao atualizar o registro.';
            }
        }
        return view('app.fornecedor.adicionar', ['id' => $request->input('id'), 'msg' => $msg]);
    }

    public function editar(Request $request, $id){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }

    public function excluir(Request $request, $id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar');
    }
}
