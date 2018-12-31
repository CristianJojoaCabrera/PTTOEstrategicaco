<?php

namespace App\Http\Controllers;

use App\Funcionarity;
use Illuminate\Http\Request;

class PptoSalesController extends Controller
{
    //
    public function ppto_sale(Request $request,$funcionarity_id){
        $funcionarity = Funcionarity::find($funcionarity_id);
        return view('ppto_sale')->with('funcionarity',$funcionarity);
    }

}
