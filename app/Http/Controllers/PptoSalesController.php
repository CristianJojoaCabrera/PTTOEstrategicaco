<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\Funcionarity;
use Illuminate\Http\Request;
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

    public function criteria_table(Request $request){
        $criteria = Criteria::all();
        return DataTables::of($criteria)
            ->addColumn('percentage_funcionarity',function ($criteria){

            })
            ->addColumn('goal_funcionarity',function ($criteria){

            })
            ->rawColumns(['estado','accion'])
            ->make(true);
    }

}
