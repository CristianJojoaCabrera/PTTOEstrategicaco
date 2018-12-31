<?php

namespace App\Http\Controllers;

use App\Funcionarity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FuncionarityController extends Controller
{
    //

    public function funcionarity_index(Request $request){
        return view('funcionarity_index');
    }
    public function funcionarity(Request $request){

        return view('funcionarity');
    }
    public function save_funcionarity(Request $request){
        Funcionarity::create($request->all());
        return redirect()->route('funcionarity_index');
    }
    public function funcionarity_table(Request $request){

        $funcionarities = Funcionarity::all();
        return DataTables::of($funcionarities)
            ->addColumn('sell',function ($funcionarity){
                if($funcionarity->position == 'Ejecutivo'){
                    return '<div class="align-content-center"><a title="Aplica Ppto" href="'.route('ppto_sale',$funcionarity->id).'" class="btn btn-sm btn-primary sale">Aplica<i class=""></i></a></div>';
                }else{
                    return 'No Aplica';
                }
            })
            ->rawColumns(['sell'])
            ->addIndexColumn()
            ->make(true);
    }
}
