<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        try {
            $produtos = Produtos::all();
            if($produtos) {

                return response()->json( $produtos );
            } else {

                return response()->json(['ERRO:' => 'Não existe produtos cadastrados']);
            }          

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
                'value_unit' => ['required'],
                'pedidos_compras_id' => ['required']
            ]);

            if($validateData) {
                Produtos::create($validateData)->save();

                return response()->json([
                    'Sucesso:' => 'Produto cadastrado com sucesso.',
                    'Produto:' => $validateData
                ], 201);
            } else {
                return response()->json(['ERRO:' => 'Produto não cadastrado']);
            }            

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao cadastrar o produto",
                'Detalhes' => $th
            ], 422);
        }
    }

     public function destroy($id) {
        try {
            $produto = Produtos::destroy($id);
            if($produto) {                

                return response()->json(['Deletado' => 'Produto deletado com sucesso.']);
            } else {
                return response()->json(['ERRO:' => 'Produto não encontrado']);
            }
          
        } catch (\Throwable $th) {

            return response()->json(['Erro ao deletar o produto:' => $th]);
        }
    }

    public function show($id) {
        try {
            $product = Produtos::where('id', $id)->first();

            if($product) {
                return response()->json( $product );

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

            $produto = Produtos::whereId($id)->update($validateData);

            if($produto) {

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