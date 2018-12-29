<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrazabilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trazabilidads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prospecto')->unsigned();
  					$table->foreign('id_prospecto')->references('id_prospecto')->on('prospecto');
            $table->integer('id_estado')->unsigned();
  					$table->foreign('id_estado')->references('id')->on('estados');
            $table->text('observacion')->nullable();
            $table->date('fecha')->nullable();
            $table->string('hora')->nullable();
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
        Schema::dropIfExists('trazabilidads');
    }
}
