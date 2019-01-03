<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function exist_date_ptto_sale(Request $request,$funcionarity_id,$date){

        $sale = Sales::where([
                ['funcionarity_id','=',$funcionarity_id],
                ['date','=',$date],
            ])->get();
        if(count($sale)>0){
            return new JsonResponse(true, 200);
        }
        return new JsonResponse(false, 200);
    }
}
