<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PedidosCompras extends Model
{
    protected $fillable = ['cliente_id', 'produto_id', 'status', 'total_geral'];
    protected $appends = ['clientes'];
    use HasFactory;

    public function clientes() 
    {
        return $this->hasOne(Clientes::class);
    }

    public function produtos() 
    {
        return $this->hasOne(Produtos::class);
    }

    public function getClientesAttribute()
    {
        return Clientes::find(1)->pedido();
        //return Clientes::find(4);
    }
}
