<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduseListaCumparaturisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produse_lista_cumparaturis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->bigInteger('id_produs');
            $table->integer('cantitate');
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
        Schema::dropIfExists('produse_lista_cumparaturis');
    }
}
