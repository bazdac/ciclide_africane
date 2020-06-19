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
            $table->string('nume')->nullable();
            $table->bigInteger('id_categorie')->nullable();
            $table->float('pret')->nullable();
            $table->text('descriere')->nullable();
            $table->integer('cantitate_in_stoc')->nullable();
            $table->text('link_poza')->nullable();
            $table->integer('este_vizibil')->nullable();
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
