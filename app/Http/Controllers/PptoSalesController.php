<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\Funcionarity;
use App\PptoSales;
use App\Sales;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use PhpParser\Node\Expr\New_;
use Yajra\DataTables\DataTables;

class PptoSalesController extends Controller
{
    //
    public function ppto_sale(Request $request,$funcionarity_id){

        $funcionarity = Funcionarity::find($funcionarity_id);
        $criterias = Criteria::all();
        return view('ppto_sale')
            ->with('funcionarity',$funcionarity)
            ->with('criterias',$criterias);
    }

    public function save_criteria_funcionarity(Request $request){

        $funcionarity_sale = new Sales();
        $funcionarity_sale->funcionarity_id = $request->get('funcionarity_id');
        $funcionarity_sale->date = $request->get('funcionarity_id');
        $funcionarity_sale->save();
        $data = json_decode($request->get('objecDataCriteria'));
        foreach ( $data as $funcionarity_ppto_criteria){
            $ppto_sale = new PptoSales();
            $ppto_sale->sale_id = $funcionarity_sale->id;
            $ppto_sale->criteria_id = $funcionarity_ppto_criteria->idCriteria;
            $ppto_sale->percentage = $funcionarity_ppto_criteria->percentage;
            $ppto_sale->budget = $funcionarity_ppto_criteria->budget;
            $ppto_sale->save();
        }
        return new JsonResponse($data,200);
    }

}
