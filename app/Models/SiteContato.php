<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteContato extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}

//#use \App\Models\SiteContato


/*
SiteContato::create(['nome' => 'Jairo', 'telefone' => '(84) 98730-8880', 'email' => 'jairo@email.com', 'motivo_contato' => 1, 'mensagem' => 'Estou usando o Super Gestão']);
SiteContato::create(['nome' => 'Camily', 'telefone' => '(84) 99648-3362', 'email' => 'camily@email.com', 'motivo_contato' => 2, 'mensagem' => 'Gostei bastante do Super Gestão']);
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('João', '(88) 91111-2222', 'joao@contato.com.br', 3, 'É muito difícil localizar a opção de listar todos os produtos');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Rosa', '(33) 92222-3333', 'rosa@contato.com.br', 1, 'Quando custa essa aplicação?');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Fernando', '(11) 94444-5555', 'fernando@contato.com.br', 1, 'Como consigo criar multiplos usuários para minha empresa?');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('André', '(88) 95555-6666', 'andre@contato.com.br', 2, 'Parabéns pela ferramenta, estou obtendo ótimos resultados!');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Ana', '(33) 96666-7777', 'ana@contato.com.br', 3, 'Não gostei muito das cores, consigo mudar de tema?');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Helena', '(11) 97777-8888', 'helena@contato.com.br', 2, 'Consigo controlar toda a minha empresa de modo fácil e prático.');
*/


//$contato = SiteContato::where('id', '>', 1)->get(); 

//$contato = SiteContato::where('motivo_contato', '<', 2)->get();

//$contato = SiteContato::where('motivo_contato', '<', 2)->get();

//$contato = SiteContato::where('nome', 'Maria')->get();

//$contato = SiteContato::where('mensagem', 'like', '%gost%')->get();

//$contato = SiteContato::where('mensagem', 'like', '%gost%')->get();

//$contatos = SiteContato::whereIn('motivo_contato', [1, 3])->get();

//$contatos = SiteContato::whereNotIn('motivo_contato', [1, 3])->get();

//$contatos = SiteContato::whereBetween('motivo_contato', [1, 2])->get();

//$contatos = SiteContato::whereNotBetween('motivo_contato', [1, 2])->get();

//select * from site_contatos where nome <> 'Fernando' and motivo_contato in(1,2) and created_at between '20220801' and '20220831';
//$contatos = SiteContato::where('nome', '<>', 'Fernando')->whereIn('motivo_contato', [1,2])->whereBetween('created_at', ['20220801', '20220831'])->get(); 

//select * from site_contatos where nome <> 'Fernando' or motivo_contato in(1,2) or created_at between '20220801' and '20220831';
//$contatos = SiteContato::where('nome', '<>', 'Fernando')->orWhereIn('motivo_contato', [1,2])->orWhereBetween('created_at', ['20220801', '20220831'])->get(); 

//$contatos = SiteContato::whereNull('created_at')->get();

//$contatos = SiteContato::whereNotNull('created_at')->get();

//$contatos = SiteContato::whereNull('created_at')->whereNull('updated_at')->get();

//$contatos = SiteContato::whereDate('created_at', '2022:08:18')->get();

//$contatos = SiteContato::whereDay('created_at', '18')->get();

//$contatos = SiteContato::whereMonth('created_at', '08')->get();

//$contatos = SiteContato::whereYear('created_at', '2022')->get();

//$contatos = SiteContato::whereYear('created_at', '2022')->whereMonth('created_at', '08')->whereDay('created_at', '18')->get();

//$contatos = SiteContato::whereDay('created_at', '<>', '17')->get();

//$contatos = SiteContato::whereColumn('created_at', 'updated_at')->get();

//$contatos = SiteContato::whereColumn('created_at', '<>', 'updated_at')->get();

//$contatos = SiteContato::whereColumn('created_at', '>=', 'updated_at')->get();

//XXXXX$contatos = SiteContato::where('nome', 'Jairo')->orWhere('nome', 'Camily')->whereBetween('motivo_contato', [1, 2])->orWhereBetween('id', [5, 7])->get();  

/*$contatos = SiteContato::where(function($query){
    $query->where('nome', 'Jairo')->orWhere('nome', 'Camily')->get();
})->where(function($query){
    $query->whereBetween('motivo_contato', [1, 2])->orWhereBetween('id', [4, 6])->get();
})->get();*/

//$contatos = SiteContato::orderBy('nome')->get();

//$contatos = SiteContato::orderBy('nome', 'desc')->get();

//$contatos = SiteContato::orderBy('motivo_contato')->orderBy('nome')->get();

//$contatos = SiteContato::orderBy('motivo_contato')->orderBy('nome')->whereBetween('id', [4, 6])->get();

//$contatos = SiteContato::where('id', '>', '3')->get();

//$contatos->first();
//$contatos->last();
//$contatos->reverse();

//$contatos = SiteContato::all()->toArray();
//$contatos = SiteContato::all()->toJson();

//$contatos = SiteContato::pluck('nome')->all();
//$contatos = SiteContato::pluck('nome')->sort()->first();
//$contatos = SiteContato::pluck('email', 'nome');

//$contato = SiteContato::find(7)
//$contato->delete(); // Preenche coluna de deletado
//$contato->forceDelete(); // Deleta de verdade
//SiteContato::where('id', 5)->delete();
//SiteContato::destroy(6);

// SiteContato::withTrashed()->get();



