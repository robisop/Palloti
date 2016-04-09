<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjekt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekt_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('projekt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov')->nullable();
            $table->text('popis')->nullable();
            $table->text('poznamka')->nullable();
            $table->decimal('konecna_suma', 10, 2)->nullable();
            $table->unsignedInteger('id_dieta')->nullable();
            $table->unsignedTinyInteger('id_projekt_stav')->nullable();
            $table->timestamps();
            $table->foreign('id_dieta')->references('id')->on('dieta');
            $table->foreign('id_projekt_stav')->references('id')->on('projekt_stav');
        });

        Schema::create('projekt_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_projekt')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_projekt')->references('id')->on('projekt')->onDelete('cascade');
            $table->foreign('id_subor')->references('id')->on('subor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projekt_subor');
        Schema::drop('projekt');
        Schema::drop('projekt_stav');
    }
}
