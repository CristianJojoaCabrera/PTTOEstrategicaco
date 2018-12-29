<?php

use Illuminate\Database\Seeder;
use \App\Estado;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estados = [
            ['id'=>1,'nombre'=>'Cita agendada'],
            ['id'=>2,'nombre'=>' agendar otra cita'],
            ['id'=>3,'nombre'=>' solicita cotización'],
            ['id'=>4,'nombre'=>' cotización presentada'],
            ['id'=>5,'nombre'=>' negocio ganado'],
            ['id'=>6,'nombre'=>' negocio perdido']
          ];
          foreach ($estados as $estado) {
              $aux = new Estado();
              $aux->id= $estado['id'];
              $aux->nombre = $estado['nombre'];
              $aux->save();
          }
    }

}
