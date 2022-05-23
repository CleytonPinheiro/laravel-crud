<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosCompras extends Model
{
    protected $fillable = [ 'sub_total', 'status', 'total_geral' ];
    use HasFactory;
}
