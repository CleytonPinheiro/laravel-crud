<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index() {
        try {            
            $clientes =  Clientes::all();
            
            if($clientes) {
                return response()->json( $clientes );
            } else {
                return response()->json([ 'Erro:' => 'Não existe cliente cadastrado']);
            }
            
        } catch (\Throwable $th) {

            return response()->json(['Error ao carregar os clientes:' => $th], 422);
        }
    }

    public function destroy($idClient) {
        try {
            $cliente = Clientes::destroy($idClient);

            if($cliente) {
                return response()->json(['Deletado' => 'Cliente deletado com sucesso']);
            } else {
                return response()->json(['Erro:' => 'Cliente não encontrado para deletá-lo']);
            }          

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

            $cliente = Clientes::create($validateData)->save();

            if($cliente) {
                return response()->json(['Sucesso' => 'Cliente cadastrado com sucesso', 'Detalhes' => $validateData ], 201);
            } else {
                return response()->json(['Erro:' => 'Cliente não foi cadastrado']);
            }         

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

            if($cliente) {
                return response()->json([ $cliente, $pedido ]);
            } else {
                return response()->json(['Erro:' => 'Cliente não encontrado']);
            }                    
            
        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao buscar o cliente",
                'Detalhes' => $th, "Cliente" => $id
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

            $cliente =  Clientes::whereId($id)->update($validateData);

            if($cliente) {
                return response()->json(['Atualizado' => 'cliente atualizado com sucesso', 'Detalhes:' => $validateData ]);
            } else {
                return response()->json(['Erro:' => 'Cliente não encontrado']);
            }               

        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao atualizar o cliente",
                'Detalhes:' => $th, 'Dados' => $validateData
            ], 422);
        }
    }
}
