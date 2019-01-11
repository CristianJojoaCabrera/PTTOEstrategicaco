<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionarity extends Model
{
    //
    protected $fillable = [
        'date_admision','name','last_name','document_type','document_number','document_from',
        'address','phone','cell_phone','eps','pension','unemployment','position','risk','contract_type',
        'duration','number_contract','basic_salary','commission'
    ];
}
