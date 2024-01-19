<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNos extends Controller
{
    function sobreNos(){
        return view('site.sobreNos');
    }
}
