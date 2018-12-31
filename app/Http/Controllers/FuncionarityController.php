<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionarityController extends Controller
{
    //

    public function funcionarity_index(Request $request){
        return view('funcionarity_index');
    }
    public function funcionarity(Request $request){
        return view('funcionarity');
    }
}
