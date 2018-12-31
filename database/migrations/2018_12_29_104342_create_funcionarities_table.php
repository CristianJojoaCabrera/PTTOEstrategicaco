<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarities', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_admision')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->integer('document_type')->unsigned();
            $table->string('document_number');
            $table->string('document_from');
            $table->string('address');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('eps');
            $table->string('pension');
            $table->string('unemployment');
            $table->string('position');
            $table->string('risk');
            $table->string('contract_type');
            $table->string('duration');
            $table->integer('number_contract')->unsigned();
            $table->string('basic_salaric');
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
        Schema::dropIfExists('funcionarities');
    }
}
