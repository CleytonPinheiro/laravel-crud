<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosCompras extends Model
{
    protected $fillable = ['cliente_id', 'produto_id', 'status', 'total_geral'];
    use HasFactory;

    public function cliente() 
    {
        return $this->hasOne(Clientes::class);
    }

    public function produto() 
    {
        return $this->hasOne(Produtos::class);
    }  
}
