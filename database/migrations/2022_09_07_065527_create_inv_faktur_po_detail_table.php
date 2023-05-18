<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvFakturPoDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_faktur_po_detail', function (Blueprint $table) {
            $table->bigIncrements('id_faktur_po_detail');
            $table->integer('id_faktur_po');
            $table->integer('quantity');
            $table->integer('id_material');
            $table->integer('harga_satuan')->nullable()->default(null);
            $table->integer('total')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_faktur_po_detail');
    }
}