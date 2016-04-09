<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoziadavka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poziadavka_typ', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('poziadavka_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('poziadavka', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov')->nullable();
            $table->text('popis')->nullable();
            $table->date('datum_odoslania')->nullable();
            $table->date('datum_prijatia_odpovede')->nullable();
            $table->longText('odpoved')->nullable();
            $table->unsignedTinyInteger('id_poziadavka_typ')->nullable();
            $table->unsignedTinyInteger('id_poziadavka_stav')->nullable();
            $table->unsignedInteger('id_dieta')->nullable();
            $table->timestamps();
            $table->foreign('id_poziadavka_typ')->references('id')->on('poziadavka_typ');
            $table->foreign('id_poziadavka_stav')->references('id')->on('poziadavka_stav');
            $table->foreign('id_dieta')->references('id')->on('dieta');
        });

        Schema::create('poziadavka_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_poziadavka')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_poziadavka')->references('id')->on('poziadavka')->onDelete('cascade');
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
        Schema::drop('poziadavka_subor');
        Schema::drop('poziadavka');
        Schema::drop('poziadavka_stav');
        Schema::drop('poziadavka_typ');
    }
}
