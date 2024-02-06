<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
class PrincipalController extends Controller
{
    function principal(){

        $motivo = MotivoContato::all();
       
        return view('site.principal', ['motivo_contato' => $motivo] );
    }
}
