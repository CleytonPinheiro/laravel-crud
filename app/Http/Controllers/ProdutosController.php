<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        try {
          return "PRODUTOS";

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
