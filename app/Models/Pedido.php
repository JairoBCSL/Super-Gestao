<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function cliente(){
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function pedidos_produtos(){
        return $this->hasMany('\App\Models\PedidoProduto');
    }

    public function produtos(){
        return $this->belongsToMany('\App\Models\Produto', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('quantidade', 'id', 'created_at', 'updated_at');
    }

    protected $fillable = ['cliente_id'];
}
