<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;


class ProdutosController extends Controller
{
    public function index() {
        try {
            return Produtos::all();

        } catch (\Throwable $th) {
            return response()->json(['Error ao carregar os clientes:' => $th], 422);
        }
    }

    public function store(Request $request) {
        try {            
            $validateData = $request->validate([
                'product' =>['required', 'max:255'],
                'amount' => ['required'],
                'category' => ['required'],
                'value_unit' => ['required']
            ]);

            Produtos::create($validateData)->save();

            return response()->json([
                'Sucesso:' => 'Produto cadastrado com sucesso.',
                'Produto:' => $validateData
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao cadastrar o produto",
                'Detalhes' => $th
            ], 422);
        }
    }

     public function destroy($id) {
        try {
            Produtos::destroy($id);

            return response()->json(['Deletado' => 'Produto deletado com sucesso.']);

        } catch (\Throwable $th) {

            return response()->json(['Erro ao deletar o produto:' => $th]);
        }
    }

    public function show($id) {
        try {
            $product = Produtos::where('id', $id)->first();

            if($product) {
                return response()->json([ $product ]);

            } else {
                 return response()->json([ 'Erro:' => 'Produto não encontrado' ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao buscar o produto.",
                'Detalhes' => $th
            ]);
        }
    }

    public function update(Request $request, $id) {
        try {            
            $validateData = $request->validate([
                'product' =>['required', 'max:255'],
                'amount' => ['required'],
                'category' => ['required'],
                'value_unit' => ['required']
            ]);

            if($validateData) {
                Produtos::whereId($id)->update($validateData);

                return response()->json([
                    'Sucesso:' => 'Produto atualizado com sucesso.',
                    'Produto:' => $validateData
                ], 201);
            } else {
                return response()->json(['Erro:' => 'Produto não atualizado']);
            }          

        } catch (\Throwable $th) {

            return response()->json([
                'Erro:' => "Erro ao cadastrar o produto",
                'Detalhes' => $th
            ], 422);
        }
    }
}