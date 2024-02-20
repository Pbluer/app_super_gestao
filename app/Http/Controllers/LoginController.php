<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    public function index(){
        return view('site.login', [ 'titulo' => 'Login']);
    }
    
    public function autenticar( Request $request){

        $errorMensage = $request->get('erro') == 1 ? 'Usuário não cadastrado.' : null;
        $errorMensage = $request->get('erro') == 2 ? 'Necessário realizar o login para ter acesso a página.' : null;
        

        //regras de validaçao dos campos
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // feedback das validacao das regras

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório.'
        ];

        // se nao passar pelo validate
        $request->validate($regras,$feedback);


        $email = $request->get('usuario');
        $senha = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();

        if( isset($usuario->name) ){
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.cliente');
            
        }else{
            return redirect()->route('site.login', [ 'erro' => 2 ], 200 );
        }
       
    }

    public function sair(){
        session_destroy();      
        return redirect()->route('site.principal');
    }
}
