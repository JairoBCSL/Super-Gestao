<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        echo '<br>';
        */
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem').' - por parâmetro';
        print_r($contato->getAttributes());
        $contato->save();

        $contato2 = new SiteContato();
        $contato2->fill($request->all());
        $contato2->mensagem = $contato2->mensagem . ' - por fill';
        print_r($contato2->getAttributes());
        $contato2->save();

        SiteContato::create($request->all());
        */

        return view('site.contato', ['titulo'=>'Contato', 'motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000|unique:site_contatos'
        ];

        $feedbacks = [
            'required' => 'O campo precisa ser preenchido', 
            'nome.min' => 'Nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'Nome deve ter no máximo 40 caracteres',
            'email.email' => 'Email precisa seguir o formato usuario@dominio',
            'mensagem.max' => 'Mensagem deve ter no máximo 2000 caracteres',
            'mensagem.unique' => 'Essa mensagem já existe no campo'
        ];

        $request->validate($regras, $feedbacks);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
