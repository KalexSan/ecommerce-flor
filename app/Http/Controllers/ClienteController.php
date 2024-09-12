<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function cadastrar( Request $request ){

        $data = [];
        return view("cadastrar", $data);
       
    }

    public function cadastrarCliente(Request $request){
        $usuario = new Usuario(
            [
                'nome' => $request->input("nome", ""),
                'email' => $request->input("email", ""),
                'login' => $request->input("cpf", ""),
                'password' => Hash::make($request->input("password", ""))
            ]
        );
        $usuario->save();
        $endereco = new Endereco([
            'logradouro' => $request->input("logradouro", ""),
            'numero' => $request->input("numero", ""),
            'cidade' => $request->input("cidade", ""),
            'cep' => $request->input("cep", ""),
            'complemento' => $request->input("complemento", ""),
            'estado' => $request->input("estado", ""),
            'usuario_id' => $usuario->id
        ]);
        $endereco->save();
        $request->session()->flash("sucesso", "Usuário cadastrado com sucesso!");
        return redirect()->route('cadastrar');
    }
}
