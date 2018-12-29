<?php

namespace App\Http\Controllers;

use App\Auspiciador;
use App\Prospecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AuspiciadorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prospectos = Prospecto::with(['estado','trazabilidad'])->where('id_usuario',22)->get();
        //dd($prospectos);
        return view('auspiciadores');
    }
    public function auspiciadores_tabla(Request $request){
      $auspiciadores = Auspiciador::all();
      return DataTables::of($auspiciadores)
          ->addindexColumn()
          ->make(true);
    }

    public function auspiciador_prospecto(Request $request,$id_auspiciador){
        $auspiciador = Auspiciador::where('id_usuario',$id_auspiciador)->first();
        return view('auspiciador_prospectos')
            ->with('auspiciador',$auspiciador)
            ->with('id_auspiciador',$id_auspiciador);
    }

    public function prospectos_auspiciador_tabla(Request $request,$id_auspiciador){
       $prospectos = Prospecto::with('estado','trazabilidad')->where('id_usuario',$id_auspiciador)->get();
        return DataTables::of($prospectos)
            ->addindexColumn()
            ->make(true);
    }

    public function auspiciador_prospectos_detalles(Request $request,$id_prospecto){

        $prospecto = Prospecto::with('user','estado')->where('id_prospecto',$id_prospecto)->first();
        $estado = 'sin asignar';
        isset($prospecto->estado)?$estado = $prospecto->estado : $estado = 'sin asignar';
        return view('auspiciador_prospectos_detalles')
            ->with('id_prospecto',$id_prospecto)
            ->with('prospectoData',$prospecto)
            ->with('estado',$estado);
    }
    public function resulatos_prospecto(Request $request,$id_auspiciador){

        $ganados = Auspiciador::withCount([
            'prospectos as ganados_count' => function ($query) {
                $query->where('id_estado', 5);
            }
        ])->where('id_usuario',$id_auspiciador)->first();
        $perdidos = Auspiciador::withCount([
            'prospectos as perdidos_count' => function ($query) {
                $query->where('id_estado', 6);
            }
        ])->where('id_usuario',$id_auspiciador)->first();
        $proceso = Auspiciador::withCount([
            'prospectos as proceso_count' => function ($query) {
                $query->whereBetween('id_estado', [1, 4]);
            }
        ])->where('id_usuario',$id_auspiciador)->first();

        $arrayProspectos = array();
        array_push($arrayProspectos,$ganados->ganados_count);
        array_push($arrayProspectos,$perdidos->perdidos_count);
        array_push($arrayProspectos,$proceso->proceso_count);

        $response = array(
            'status' => 'success',
            'msg' => $arrayProspectos,
        );
        return response()->json($response);
    }

}
