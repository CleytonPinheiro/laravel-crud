<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['name',  'surname', 'birth_date', 'cpf', 'pedidos_compras_id'];
    use HasFactory;

    public function pedidos_compras()
    {
        return $this->belongsTo(PedidosCompras::class);
    }
}
