<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = ['product',  'amount', 'category', 'value_unit', 'pedidos_compras_id' ];
    use HasFactory;

    public function pedido() 
    {
        return $this->belongsTo(PedidosCompras::class);
    }
}
