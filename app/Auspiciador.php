<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auspiciador extends Model
{
    //
      protected $table = 'usuario';

      public function prospectos(){
          return $this->hasMany('App\Prospecto', 'id_usuario','id_usuario');
      }
}
