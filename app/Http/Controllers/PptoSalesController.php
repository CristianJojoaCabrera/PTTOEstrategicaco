<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\Funcionarity;
use App\PptoSales;
use App\Sales;
use Carbon\Carbon;
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
    public function ppto_sale_ajax(Request $request,$funcionarity_id){
        $funcionarity = Funcionarity::find($funcionarity_id);
        $criterias = Criteria::all();
        return view('ppto_sale_ajax')
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
            $percentage = $funcionarity_ppto_criteria->percentage;
            $percentage = preg_replace('/[^0-9]/','',$percentage);
            $budget = $funcionarity_ppto_criteria->budget;
            $budget = preg_replace('/[^0-9]/','',$budget);
            $ppto_sale = new PptoSales();
            $ppto_sale->sale_id = $funcionarity_sale->id;
            $ppto_sale->criteria_id = $funcionarity_ppto_criteria->idCriteria;
            $ppto_sale->percentage = $percentage;
            $ppto_sale->budget = $budget;
            $ppto_sale->save();
        }
        return new JsonResponse($data,200);
    }

    public function ppto_sale_edit(Request $request,$funcionarity_id){
        $funcionarity = Funcionarity::find($funcionarity_id);
        $sales = Sales::where('funcionarity_id',$funcionarity_id)
            ->orderBy('date', 'desc')->get();
        $criterias = Criteria::all();
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
            ->with('criterias',$criterias)
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
            ->addColumn('criteria',function ($ppto_sale_funcionarity){
                return $ppto_sale_funcionarity->criteria->name;
            })
            ->addColumn('percentage',function ($ppto_sale_funcionarity){
                $percentage = $ppto_sale_funcionarity->percentage;
                $percentage = number_format($percentage, 0, ",", ".");
                return $percentage.'%';
            })
            ->addColumn('budget',function ($ppto_sale_funcionarity){
                $budget = $ppto_sale_funcionarity->budget;
                $budget = number_format($budget, 0, ",", ".");
                return '$'.$budget;
            })
            ->addColumn('accumulated',function ($ppto_sale_funcionarity)use($sale_id,$funcionarity_id){
                $dateStart = Carbon::parse($ppto_sale_funcionarity->sales->date);
                $dateStart = $dateStart->subYear();
                $year = $dateStart->year;
                $dateStart = Carbon::create($year, 1, 1);
                $accumulated = PptoSales::whereHas('sales',function ($query)use($sale_id,$ppto_sale_funcionarity,$funcionarity_id,$dateStart) {
                    $query->where([
                        ['funcionarity_id', '=', $funcionarity_id],
                        ['date', '<=', $ppto_sale_funcionarity->sales->date],
                        ['date', '>=', $dateStart]
                    ]);
                })->where('criteria_id',$ppto_sale_funcionarity->criteria_id)->sum('budget');
                $ppto_sale_funcionarity = PptoSales::find($ppto_sale_funcionarity->id);
                $ppto_sale_funcionarity->accumulated = $accumulated;
                $ppto_sale_funcionarity->save();
                $accumulated = number_format($accumulated, 0, ",", ".");
                return '$'.$accumulated;
            })
            ->addColumn('execution',function ($ppto_sale_funcionarity){
                $execution = $ppto_sale_funcionarity->execution;
                $execution = number_format($execution, 0, ",", ".");
                return '$'.$execution;
            })
            ->addColumn('accumulated_execution',function ($ppto_sale_funcionarity)use($sale_id,$funcionarity_id){
                $dateStart = Carbon::parse($ppto_sale_funcionarity->sales->date);
                $dateStart = $dateStart->subYear();
                $year = $dateStart->year;
                $dateStart = Carbon::create($year, 1, 1);
                $accumulated_execution = PptoSales::whereHas('sales',function ($query)use($sale_id,$ppto_sale_funcionarity,$funcionarity_id,$dateStart) {
                    $query->where([
                        ['funcionarity_id', '=', $funcionarity_id],
                        ['date', '<=', $ppto_sale_funcionarity->sales->date],
                        ['date', '>=', $dateStart]
                    ]);
                })->where('criteria_id',$ppto_sale_funcionarity->criteria_id)->sum('execution');
                $ppto_sale_funcionarity = PptoSales::find($ppto_sale_funcionarity->id);
                $ppto_sale_funcionarity->accumulated_execution = $accumulated_execution;
                $ppto_sale_funcionarity->save();
                $accumulated_execution = number_format($accumulated_execution, 0, ",", ".");
                return '$'.$accumulated_execution;
            })
            ->addColumn('execution_percentage',function ($ppto_sale_funcionarity){
                $execution_percentage = PptoSales::find($ppto_sale_funcionarity->id);
                $execution_percentage_val = ($execution_percentage->execution / $execution_percentage->budget)*100;
                $execution_percentage->execution_percentage = $execution_percentage_val;
                $execution_percentage->save();
                $execution_percentage_val = number_format($execution_percentage_val, 0, ",", ".");
                return $execution_percentage_val.'%';
            })
            ->addColumn('accumulated_percentage',function ($ppto_sale_funcionarity)use($sale_id,$funcionarity_id){
                $dateStart = Carbon::parse($ppto_sale_funcionarity->sales->date);
                $dateStart = $dateStart->subYear();
                $year = $dateStart->year;
                $dateStart = Carbon::create($year, 1, 1);
                $accumulated_percentage = PptoSales::whereHas('sales',function ($query)use($sale_id,$ppto_sale_funcionarity,$funcionarity_id,$dateStart) {
                    $query->where([
                        ['funcionarity_id', '=', $funcionarity_id],
                        ['date', '<=', $ppto_sale_funcionarity->sales->date],
                        ['date', '>=', $dateStart]
                    ]);
                })->where('criteria_id',$ppto_sale_funcionarity->criteria_id)->sum('execution_percentage');
                $ppto_sale_funcionarity = PptoSales::find($ppto_sale_funcionarity->id);
                $ppto_sale_funcionarity->accumulated_percentage = $accumulated_percentage;
                $ppto_sale_funcionarity->save();
                $accumulated_percentage = number_format($accumulated_percentage, 0, ",", ".");
                return $accumulated_percentage.'%';
            })
            ->addColumn('total_accrued',function ($ppto_sale_funcionarity)use($sale_id,$funcionarity_id){
                $ppto_sale_funcionarity =
                    PptoSales::with('sales.funcionarity')
                        ->where([
                            ['id',$ppto_sale_funcionarity->id],
                        ])->first();
                $total_accrued =
                    (
                        ((((int)$ppto_sale_funcionarity->execution_percentage ))/100)*
                        ((((int)$ppto_sale_funcionarity->percentage))/100)
                    );
                $basic_salary = $ppto_sale_funcionarity->sales->funcionarity->basic_salary;
                $basic_salary = preg_replace('/[^0-9]/','',$basic_salary);
                $basic_salary = (int)$basic_salary;
                $total_accrued = $total_accrued *$basic_salary;
                $ppto_sale_funcionarity->total_accrued = $total_accrued;
                $ppto_sale_funcionarity->save();
                $total_accrued = number_format($total_accrued, 0, ",", ".");
                return '$ '.$total_accrued;
            })
            ->addColumn('Accion',function($client){
                return
                    '
                        <a title="" href="javascript:;" class="btn btn-warning btn-sm asignar"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a title="Eliminar Servicio" href="javascript:;" class="btn btn-sm btn-danger delete">
                        <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    ';
            })
            ->rawColumns(['Accion'])
            ->make(true);
    }

    public function save_data_edit_ppto(Request $request){
        $percentage = $request->get('percentage');
        $percentage = preg_replace('/[^0-9]/','',$percentage);
        $budget = $request->get('budget');
        $budget = preg_replace('/[^0-9]/','',$budget);
        $execution = $request->get('execution');
        $execution = preg_replace('/[^0-9]/','',$execution);

        $ppto_funcionarity = PptoSales::find($request->get('id_ppto'));
        $ppto_funcionarity->percentage = $percentage;
        $ppto_funcionarity->budget = $budget;
        $ppto_funcionarity->execution = $execution;
        $ppto_funcionarity->save();
        return new JsonResponse('Datos Actualizados',200);
    }

    public function save_criteria_funcionarity_edit(Request $request){

        $data = json_decode($request->get('objecDataCriteriaedit'));
        foreach ( $data as $funcionarity_ppto_criteria){
            $percentage = $funcionarity_ppto_criteria->percentage;
            $percentage = preg_replace('/[^0-9]/','',$percentage);
            $budget = $funcionarity_ppto_criteria->budget;
            $budget = preg_replace('/[^0-9]/','',$budget);
            $ppto_sale = new PptoSales();
            $ppto_sale->sale_id = $request->get('sale_id');
            $ppto_sale->criteria_id = $funcionarity_ppto_criteria->idCriteria;
            $ppto_sale->percentage = $percentage;
            $ppto_sale->budget = $budget;
            $ppto_sale->save();
        }
        return new JsonResponse('bien hecho',200);
    }

    public function list_criteria_date_without_check(Request $request,$date_id){

        $sale_ppto = PptoSales::where('sale_id',$date_id)->get();
        $sale_ppto = $sale_ppto->pluck('criteria_id','id')->toArray();
        $criteria = Criteria::whereNotIn('id', array_values($sale_ppto))->get();
        return new JsonResponse($criteria,200);
    }
}

