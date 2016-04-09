<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDieta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rodinny_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('skola', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('misia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kod', 2)->unique();
            $table->string('nazov');
            $table->unsignedSmallInteger('id_krajina');
            $table->timestamps();

            $table->foreign('id_krajina')->references('id')->on('krajina');
        });

        Schema::create('dieta_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('dieta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meno')->nullable();
            $table->string('priezvisko')->nullable();
            $table->char('pohlavie')->nullable();
            $table->date('datum_narodenia')->nullable();
            $table->unsignedTinyInteger('rok_narodenia')->nullable();
            $table->unsignedTinyInteger('id_rodinny_stav')->nullable();
            $table->unsignedTinyInteger('id_skola')->nullable();
            $table->date('skola_datum_nastavenia')->nullable();
            $table->boolean('prekladat_list')->nullable();
            $table->unsignedInteger('id_misia')->nullable();
            $table->string('kod', 10)->unique()->nullable();
            $table->text('poznamka')->nullable();
            $table->unsignedTinyInteger('id_dieta_stav')->nullable();
            $table->string('dovod_ukoncenia')->nullable();
            $table->date('datum_pozastavene_do')->nullable();
            $table->timestamps();

            $table->foreign('id_rodinny_stav')->references('id')->on('rodinny_stav');
            $table->foreign('id_skola')->references('id')->on('skola');
            $table->foreign('id_misia')->references('id')->on('misia');
            $table->foreign('id_dieta_stav')->references('id')->on('dieta_stav');
        });

        Schema::create('dieta_rodic', function (Blueprint $table) {
            $table->unsignedInteger('id_dieta')->index();
            $table->unsignedInteger('id_rodic')->index();
            $table->foreign('id_dieta')->references('id')->on('dieta')->onDelete('cascade');
            $table->foreign('id_rodic')->references('id')->on('rodic')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dieta_rodic');
        Schema::drop('dieta');
        Schema::drop('dieta_stav');
        Schema::drop('misia');
        Schema::drop('skola');
        Schema::drop('rodinny_stav');
    }
}
