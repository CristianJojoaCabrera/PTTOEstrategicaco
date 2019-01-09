<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePptoSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppto_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned();
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->integer('criteria_id')->unsigned();
            $table->foreign('criteria_id')->references('id')->on('criterias');
            $table->string('percentage');
            $table->string('budget')->default('0');
            $table->string('accumulated');
            $table->string('execution')->default('0');
            $table->string('accumulated_execution');
            $table->string('execution_percentage');
            $table->string('accumulated_percentage');
            $table->string('total_accrued');
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
        Schema::dropIfExists('ppto_sales');
    }
}
