<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{

    function sobreNos(){
        return view('site.sobreNos');
    }
}
