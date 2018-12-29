<?php

namespace App\Http\Controllers;

use App\Trazabilidad;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TrazabilidadController extends Controller
{
    //

    public function trazabilidad_tabla(Request $request,$id_prospecto){
        $prospectos = Trazabilidad::with('estado')
            ->where('id_prospecto',$id_prospecto)
                ->orderBy('id','DESC')->get();
        return DataTables::of($prospectos)

            ->addIndexColumn()
            ->make(true);
    }
}
