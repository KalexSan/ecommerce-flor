<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller{
    
    public function logar(Request $request){
        if($request->isMethod("POST")){
            //quando o usuario clicar no botão de logar entra aqui
            $login = $request->input("login");
            $senha = $request->input("senha");

            $user = Usuario::where('login', $login)->first();

            error_log('Usuario" ' . json_encode($user));

            if(!$user){
                $request->session()->flash("error", "Usuário ou senha inválidos");
                return view('logar');
            }else{
                error_log('Senhas iguais: ' . json_encode($senha));
                error_log('Senhas iguais: ' . json_encode($user->password));
                error_log('Senhas iguais: ' . json_encode(Hash::check($senha, $user->password)));
            }

            $credential = [
                "login" => $login,
                "password" => $senha
            ];
            //Efetuo o login
            error_log('Tentando logar: ' . json_encode($credential));
            error_log('Tentando logar: ' . json_encode(Auth::attempt($credential)));

            if(Auth::attempt($credential)){
                error_log('Logado com sucesso');
                return redirect()->route('home');
            }
            else{
                error_log('Erro ao logar');
                $request->session()->flash("error", "Usuário ou senha inválidos");
            }
        }

        return view('logar');
    }

    public function sair(){
        //deslogar o usuario
        Auth::logout();
        return redirect()->route('home');
    }
}