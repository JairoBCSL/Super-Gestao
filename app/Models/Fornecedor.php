<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos(){
        return $this->hasMany('\App\Models\Produto', 'fornecedor_id', 'id');
    }
}

//#use \App\Models\Fornecedor

//\App\Models\Fornecedor::create(['nome'=>'Fornecedor ABC', 'site'=>'forncedorabc.com.br', 'uf'=>'PE', 'email'=>'contato@fornecedorabc.com.br']);

//$fornecedores2 = Fornecedor::find(2)
//foreach($fornecedores as $f){echo $f->nome . '\n';}

//$fornecedores2 = Fornecedor::find([1, 2])
//foreach($fornecedores as $f){echo $f->nome . '\n';}

//$fornecedor = Fornecedor::find(1);
//$fornecedor->save();

//$fornecedor2->fill(['nome' => 'Fornecedor 789', 'site' => 'fornecedor789.com.br', 'email' => 'contato@fornecedor789.com.br']);
//Precisa do fillable
//$fornecedor2->save();

//Fornecedor::whereIn('id', [1, 2])->update(['nome' => 'Fornecedor Teste', 'site' => 'teste.com.br'])

//$fornecedor = Fornecedor::create(['nome' => "Fornecedor Teste", 'site' => "teste.com.br", 'created_at' => "2022-08-18 13:47:46", 'updated_at'  => "2022-08-23 12:23:16", 'uf'  => "PE", 'email'  => "contato@fornecedor789.com.br", 'deleted_at'  => null,])

//Fornecedor::withTrashed()->get();
//Fornecedor::onlyTrashed()->get();

//$fornecedor = Fornecedor::withTrashed()->get();
//$fornecedor[0]->restore();

