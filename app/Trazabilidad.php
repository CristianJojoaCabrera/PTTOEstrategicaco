<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trazabilidad extends Model
{
    //
    protected $table = 'trazabilidads';

    protected $fillable = ['id_prospecto', 'id_estado', 'observacion', 'fecha', 'hora'];

    public function prospecto(){

    }
    public function estado(){
        return $this->belongsTo('App\Estado', 'id_estado');
    }

}
