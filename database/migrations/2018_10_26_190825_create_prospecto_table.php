<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProspectoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prospecto', function(Blueprint $table)
		{
					$table->engine = 'InnoDB';
					$table->increments('id_prospecto');
					$table->string('nombre_empresa', 100)->nullable();
					$table->string('nombre_contacto', 100)->nullable();
					$table->string('cargo_contacto', 100)->nullable();
					$table->string('telefono', 10)->nullable();
					$table->string('oportunidad', 500)->nullable();
					$table->string('fecha_cita', 45)->nullable();
					$table->string('hora_cita', 45)->nullable();
					$table->integer('id_usuario')->unsigned();
					$table->foreign('id_usuario')->references('id_usuario')->on('usuario');
					$table->timestamp('fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
					$table->integer('id_estado')->unsigned()->nullable();
					$table->foreign('id_estado')->references('id')->on('estados');
                    $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prospecto');
	}

}
