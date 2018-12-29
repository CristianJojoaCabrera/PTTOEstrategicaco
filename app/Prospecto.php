<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $table = 'prospecto';

    public function user(){
        return $this->belongsTo('App\Auspiciador', 'id_usuario','id_usuario');
    }
    public function estado(){
        return $this->belongsTo('App\Estado', 'id_estado');
    }
    public function trazabilidad(){
        return $this->belongsTo('App\Trazabilidad', 'id_prospecto','id_prospecto');
    }
}
