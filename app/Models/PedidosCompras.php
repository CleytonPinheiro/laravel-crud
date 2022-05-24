<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosCompras extends Model
{
    protected $fillable = ['cliente_id', 'produto_id', 'status', 'total_geral'];
    use HasFactory;

    public function clientes() 
    {
        return $this->hasOne(Clientes::class);
    }

    public function produtos() 
    {
        return $this->hasOne(Produtos::class);
    }
}
