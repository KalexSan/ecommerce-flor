<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteService {

    public function salvarUsuario(Usuario $user, Endereco $endereco){
        
        try{
            // Verifica se o usuário já existe
            $dbUsuario = Usuario::where('login', $user->login)->first();
            if($dbUsuario){
                return ['status' => 'error', 'message' => 'Usuário já cadastrado!'];
            }
            
            DB::beginTransaction(); // Inicia a transação
            $user->save(); // Salvo o usuário
            $endereco->usuario_id = $user->id; // Pego o id do usuário e atribuo ao endereço
            $endereco->save(); // Salvo o endereço
            DB::commit(); // Finalizo a transação

            return ['status' => 'sucesso', 'message' => 'Usuário cadastrado com sucesso!'];
        } catch(\Exception $e){
            // Tratamento de erro
            Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario', 'message' => $e->getMessage()]);
            DB::rollback(); // Desfaz a transação
            return ['status' => 'error', 'message' => 'Erro ao cadastrar usuário!'];
        }
    }
}