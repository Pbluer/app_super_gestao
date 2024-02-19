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

        $existe = $user->where('email', $email)->where('password', $senha)->get()->first();
        echo '<br>';
        dd($existe);      
    }
}
