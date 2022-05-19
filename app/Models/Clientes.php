<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['name',  'surname', 'birth_date', 'cpf' ];
    use HasFactory;
}
