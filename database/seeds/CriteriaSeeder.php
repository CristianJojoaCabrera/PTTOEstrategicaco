<?php

use Illuminate\Database\Seeder;
use \App\Criteria;
class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias = [
            ['name'=>'Comisión'],
            ['name'=>'Ventas Efectivas'],
            ['name'=>'Ventas nuevos clientes'],
            ['name'=>'Visitas realizadas'],
            ['name'=>'Monto de las ofertas VS presupuesto'],
            ['name'=>'Ingresos efectivos'],
            ['name'=>'otro'],

        ];
        foreach ($criterias as $criteria) {
            $aux = new Criteria();
            $aux->name = $criteria['name'];
            $aux->save();
        }
    }
}
