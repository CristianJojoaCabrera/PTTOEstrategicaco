<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\Funcionarity;
use App\PptoSales;
use App\Sales;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
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
        $funcionarity_sale->date = $request->get('date_ppto_sale');
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

    public function ppto_sale_edit(Request $request,$funcionarity_id){
        $funcionarity = Funcionarity::find($funcionarity_id);
        $sales = Sales::where('funcionarity_id',$funcionarity_id)->get();
        $arrayDates = array();
        Date::setLocale('es');
        foreach ($sales as $sale){
            $date = array();
            $date ['id'] = $sale->id;
            $date ['date'] = ucwords(Date::parse($sale->date)->format('F Y'));
            array_push($arrayDates ,$date);
        }
        return view('ppto_sale_edit')
            ->with('funcionarity',$funcionarity)
            ->with('sales',$arrayDates);

    }


    public function table_ppto_funcionarity(Request $request,$funcionarity_id,$sale_id){
        Date::setLocale('es');
        $ppto_sales_funcionarity = PptoSales::whereHas('sales',function ($query)use($funcionarity_id,$sale_id){
            $query->where([
                ['id','=',$sale_id]
            ]);
        })->with('criteria','sales')->get();
        return DataTables::of($ppto_sales_funcionarity)
            ->addColumn('accumulated',function ($ppto_sale_funcionarity)use($sale_id,$funcionarity_id){
                $accumulated = PptoSales::whereHas('sales',function ($query)use($sale_id,$ppto_sale_funcionarity,$funcionarity_id) {
                    $query->where([
                        ['funcionarity_id', '=', $funcionarity_id],
                        ['date', '<=', $ppto_sale_funcionarity->sales->date]
                    ]);
                })->where('criteria_id',$ppto_sale_funcionarity->criteria_id)->sum('budget');
                return $accumulated;
            })
            ->addColumn('criteria',function ($ppto_sale_funcionarity){
               return $ppto_sale_funcionarity->criteria->name;
            })
            ->addColumn('percentage',function ($ppto_sale_funcionarity){
                return $ppto_sale_funcionarity->percentage;
            })
            ->make(true);
    }


}
