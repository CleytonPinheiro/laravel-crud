<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\PedidosCompras;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
     public function index() {
        try {
            $pedidos = PedidosCompras::all();

            $cliente = PedidosCompras->cliente()->get();
            
            return response()->json(['pedidos' => $pedidos, 'cliente' => $cliente]);

        } catch (\Throwable $th) {

            return response()->json(['Erro ao carregar os pedidos:' => $th], 422);
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
                'status' =>['required'],
                'total_geral' => ['required'],
                'produto_id' => ['required'],
                'cliente_id' => ['required'],
            ]);

            PedidosCompras::create($validateData)->save();

            return response()->json([
                'Sucesso' => 'Pedido cadastrado com sucesso',
                'Pedido' => $validateData
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao cadastrar o pedido",
                'Detalhes' => $th,
                'Dados request:' => $request
            ], 422);
        }
    }

     public function show($id) {
        try {
            $pedido = PedidosCompras::where('id', $id)->first();

            dd($pedido);
            return response()->json(['Pedido:' => $pedido   ]);

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
