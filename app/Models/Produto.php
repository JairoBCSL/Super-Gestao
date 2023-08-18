<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
    protected $table = 'produtos';

    public function produtoDetalhe(){
        return $this->hasOne('\App\Models\ProdutoDetalhe');
    }

    public function fornecedor(){
        return $this->belongsTo('\App\Models\Fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('\App\Models\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id')->withPivot('quantidade', 'updated_at');
    }

    public function pedidos_produtos(){
        return $this->hasMany('\App\Models\PedidoProduto');
    }
}
