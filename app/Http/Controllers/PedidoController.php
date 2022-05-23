<?php

namespace App\Http\Controllers;

use App\Models\PedidosCompras;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
     public function index() {
        try {
            return PedidosCompras::all();

        } catch (\Throwable $th) {

            return response()->json(['Error ao carregar os pedidos:' => $th], 422);
        }
    }

     public function destroy($idPedido) {
        try {
            PedidosCompras::destroy($idPedido);

            return response()->json(['Deletado' => 'Pedido deletado com sucesso']);

        } catch (\Throwable $th) {

            return response()->json(['Erro ao deletar o pedido:' => $th]);
        }
    }

    public function store(Request $request) {
        try {            
            $validateData = $request->validate([
                'sub_total' => ['required'],
                'status' =>['required'],
                'total_geral' => ['required']
            ]);

            PedidosCompras::create($validateData)->save();

            return response()->json([
                'Sucesso' => 'Pedido cadastrado com sucesso',
                'Pedido' => $validateData
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao cadastrar o pedido",
                'Detalhes' => $th
            ], 422);
        }
    }

     public function show($id) {
        try {
            return response()->json([
                PedidosCompras::findOrFail($id),
            ]);

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
                'sub_total' => ['required'],
                'status' =>['required'],
                'total_geral' => ['required']
            ]);

            PedidosCompras::whereId($id)->update($validateData);
            
            return response()->json([
                'Atualizado' => 'Pedido atualizado com sucesso',
                'Detalhes:' => $validateData
            ]);     

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao atualizar o pedido",
                'Detalhes:' => $th
            ], 422);
        }
    }
}
