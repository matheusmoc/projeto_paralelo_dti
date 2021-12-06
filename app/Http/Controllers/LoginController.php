<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //erros de autenticação
        $erro = ''; 
        
        if($request->get('erro')==1){
            $erro = 'Usuário ou senha não existe';
        }
        
        if($request->get('erro')==2){
            $erro = 'Acesso não autorizado, necessário login';
        }
        return view('admin.registros.login', [ 'erro' => $erro]);
    }


    public function autenticar(Request $request)
    {
        //validações
        $rules = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $erros = [
            'usuario.email' => 'Campo de e-mail obrigatório',
            'senha.required' => 'Senha obrigatória',
        ];

        $request->validate($rules, $erros);

        //print_r($request->all());

        $email = $request->get('usuario');
        $password =  $request->get('senha');

        echo "$email | $password";
        echo "<br>";





        //iniciar model user
        //tabela
        $usuario = User::where('email', $email)->where('password', $password)->get()->first();
        
        
        if(isset($usuario->name)){
        session_start();
            $_SESSION['name'] = $usuario->name;  //middleware
            $_SESSION['email'] = $usuario->email;

            // dd($_SESSION);

            return redirect()->route('registros.index');
         } else {
         return redirect()->route('registros.login', ['erro'=> 1]);
         }
         
    }


    public function exit(){
         if(session_start())
        {
        session_destroy();
        }
        return redirect()->route('registros.login');
    }
}
