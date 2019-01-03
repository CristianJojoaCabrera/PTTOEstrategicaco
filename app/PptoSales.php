<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PptoSales extends Model
{
    //
    public function criteria(){
        return $this->belongsTo('App\Criteria', 'criteria_id');
    }
    public function sales(){
        return $this->belongsTo('App\Sales', 'sale_id');
    }
}
