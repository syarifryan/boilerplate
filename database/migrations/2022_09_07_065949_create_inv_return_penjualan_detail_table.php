<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvReturnPenjualanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_return_penjualan_detail', function (Blueprint $table) {
            $table->bigIncrements('id_return_penjualan_detail');
            $table->integer('quantity');
            $table->integer('id_return_penjualan');
            $table->integer('id_material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_return_penjualan_detail');
    }
}
