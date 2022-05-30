<?php

namespace App\Http\Controllers;

use App\Models\PedidosCompras;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index() {
        try {
            $pedidos = PedidosCompras::all();

            if($pedidos) {
                return response()->json( $pedidos );
            } else {
                return response()->json( ["ERRO:" =>  "Não existe pedido cadastrado"] );
            }        

        } catch (\Throwable $th) {
            
            return response()->json(['Erro ao carregar os pedidos:' => $th], 422);
        }
    }

    public function destroy($idPedido) {
        try {
            $pedido = PedidosCompras::destroy($idPedido);

            if($pedido) {

                return response()->json(['Deletado' => 'Pedido deletado com sucesso']);
            } else {
                return response()->json(['ERRO:' => 'Pedido não encontrado']);
            }          

        } catch (\Throwable $th) {

            return response()->json(['Erro ao deletar o pedido:' => $th]);
        }
    }

    public function store(Request $request) {
        try {            
            $validateData = $request->validate([
                'status' =>['required'],
                'total_geral' => ['required']
            ]);

             if($validateData) {
                PedidosCompras::create($validateData)->save();

                return response()->json([ 'Sucesso' => 'Pedido cadastrado com sucesso', 'Detalhes:' => $validateData ], 201);
            } else {

                return response()->json([ 'ERRO' => 'Pedido não cadastrado', 'Detalhes:' => $validateData ], 422);
            }        

        } catch (\Throwable $th) {

            return response()->json(['Erro:' => "Erro ao cadastrar o pedido", 'Detalhes' => $th, 'Dados request:' => $request ], 422);
        }
    }

    public function show($id) {
        try {            
            $pedido = PedidosCompras::where('id', $id)->first();

            if($pedido) {
                return response()->json([ $pedido ]);
            } else {
                return response()->json(['ERRO:' => 'Pedido ou produto não encontrado']);
            }         

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao buscar o pedido",
                'Detalhes' => $th
            ]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $validateData = $request->validate([
                'total_geral' => ['required'],
                'status' =>['required']
            ]);

            if($validateData) {
                PedidosCompras::whereId($id)->update($validateData);
            
                return response()->json([ 'Atualizado' => 'Pedido atualizado com sucesso', 'Detalhes:' => $validateData ]);     
            }           

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao atualizar o pedido",
                'Detalhes:' => $th
            ], 422);
        }
    }
}
