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
        

        $erro = $request->get('erro') == 1 ? 'Usuário não cadastrado.' : null;
        $erro = $request->get('erro') == 2 ? 'Necessário realizar o login para ter acesso a página.' : null;
        

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
            
            return redirect()->route('app.clientes');
            
        }else{
            return redirect()->route('site.login', [ 'erro' => 1] );
        }
       
    }
}
