<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index() {
        try {
            return Clientes::all();

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
                'cpf' => ['required']
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
            return response()->json([
                Clientes::findOrFail($id),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao buscar o cliente",
                'Detalhes' => $th
            ]);
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
