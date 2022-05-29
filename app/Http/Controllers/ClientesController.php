<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Faker\Core\Number;
use Illuminate\Http\Request;
use NumberFormatter;

class ClientesController extends Controller
{
    public function index() {
        try {            
            $clientes =  Clientes::all();

            return response()->json(['clientes' => $clientes ]);

        } catch (\Throwable $th) {

            return response()->json(['Error ao carregar os clientes:' => $th], 422);
        }
    }

    public function destroy($idClient) {
        try {
            Clientes::destroy($idClient);

            return response()->json(['Deletado' => 'Cliente deletado com sucesso']);

        } catch (\Throwable $th) {

            return response()->json(['Erro ao deletar:' => $th]);
        }
    }

    public function store(Request $request) {
        try {            
            $validateData = $request->validate([
                'name' =>['required', 'max:255'],
                'surname' => ['required'],
                'birth_date' => ['required'],
                'cpf' => ['required'],
                'pedidos_compras_id' => ['required']
            ]);

            Clientes::create($validateData)->save();

            return response()->json([
                'Sucesso' => 'Cliente cadastrado com sucesso',
                'Cliente' => $validateData
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao cadastrar o cliente",
                'Detalhes' => $th
            ], 422);
        }
    }

    public function show($id) {
        try {
            $cliente = Clientes::where('id', $id)->first();

            $pedido = $cliente->pedidos_compras()->first();
        
            return response()->json([ $cliente, $pedido ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao buscar o cliente",
                'Detalhes' => $th, "id" => $id
            ], 422);
        }
    }

    public function update(Request $request, $id) {
        try {
            $validateData = $request->validate([
                'name' =>['required', 'max:255'],
                'surname' => ['required'],
                'birth_date' => ['required'],
                'cpf' => ['required']
            ]);

            Clientes::whereId($id)->update($validateData);
            
            return response()->json([
                'Atualizado' => 'cliente atualizado com sucesso',
                'Detalhes:' => $validateData
            ]);     

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao atualizar o cliente",
                'Detalhes:' => $th
            ], 422);
        }
    }
}
