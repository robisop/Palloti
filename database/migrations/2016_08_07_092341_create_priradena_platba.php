<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriradenaPlatba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priradena_platba', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_dosla_platba');
            $table->decimal('suma', 10, 2);
            $table->text('poznamka')->nullable();
            $table->date('datum_priradenia');
            $table->unsignedInteger('id_rodic')->nullable();
            $table->unsignedInteger('id_dieta')->nullable();
            $table->unsignedInteger('id_projekt')->nullable();
            $table->timestamps();

            $table->foreign('id_dosla_platba')->references('id')->on('dosla_platba');
            $table->foreign('id_rodic')->references('id')->on('rodic');
            $table->foreign('id_dieta')->references('id')->on('dieta');
            $table->foreign('id_projekt')->references('id')->on('projekt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('priradena_platba');
    }
}
