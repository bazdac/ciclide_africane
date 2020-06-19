<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->nullable();
            $table->text('comanda_numar_inregistrare')->nullable();
            $table->text('nume')->nullable();
            $table->text('adresa')->nullable();
            $table->text('telefon')->nullable();
            $table->text('tip_plata')->nullable();
            $table->text('pret_transport')->default(0);
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
        Schema::dropIfExists('comandas');
    }
}
