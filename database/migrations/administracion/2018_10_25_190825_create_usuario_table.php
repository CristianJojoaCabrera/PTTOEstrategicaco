<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id_usuario');
			$table->string('identificacion', 20);
			$table->string('correo', 50)->unique();
			$table->string('password', 50);
			$table->string('nombres', 100)->nullable();
			$table->string('apellidos', 100)->nullable();
			$table->string('genero', 1)->nullable();
			$table->string('telefono', 20)->nullable();
			$table->integer('id_perfil')->unsigned();
			$table->foreign('id_perfil')->references('id_perfil')->on('perfil');
			$table->char('cambio_password', 1)->default('S');
			$table->timestamp('fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('id_sesion', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
