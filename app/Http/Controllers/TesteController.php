<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    function teste( Int $p1, Int $p2){       
        return view('site.teste',[
            'p1' => $p1,
            'y' => $p2
        ]);
    }
}
