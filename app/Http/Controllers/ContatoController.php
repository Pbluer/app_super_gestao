<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;

class ContatoController extends Controller
{
    function contato(Request $req){
        $motivo = MotivoContato::all();
        return view('site.contato', [ 'motivo' => $motivo ]);
    }

    public function salvar(Request $req){
        $req->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email|required',
            'motivo_contatos_id' => 'required|max:200',
        ]);
        
        SiteContato::create( $req->all());

        return redirect()->route('site.index');
    }
}
