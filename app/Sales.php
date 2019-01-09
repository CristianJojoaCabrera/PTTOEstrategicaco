<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{    //
    public function pptoSales() {
        return $this->hasMany('App\PptoSales', 'sale_id');
    }
    public function funcionarity() {
        return $this->belongsTo('App\Funcionarity', 'funcionarity_id');
    }
}
