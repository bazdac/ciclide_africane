<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nume');
            $table->bigInteger('id_categorie');
            $table->float('pret');
            $table->string('descriere');
            $table->integer('cantitate_in_stoc');
            $table->integer('link_poza');
            $table->integer('este_vizibil');
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
        Schema::dropIfExists('produses');
    }
}
