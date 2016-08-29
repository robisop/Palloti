<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoslaPlatba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosla_platba_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('dosla_platba', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iban', 50)->nullable();
            $table->string('vs', 10)->nullable();
            $table->decimal('suma', 10, 2);
            $table->string('nazov')->nullable();
            $table->string('poznamka_pre_prijemcu')->nullable();
            $table->text('popis')->nullable();
            $table->date('datum_platby')->nullable();
            $table->date('datum_spracovania')->nullable();
            $table->unsignedTinyInteger('id_dosla_platba_stav')->nullable();
            $table->timestamps();

            $table->foreign('id_dosla_platba_stav')->references('id')->on('dosla_platba_stav');
        });

        Schema::create('ocakavana_platba_typ', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('ocakavana_platba', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('suma', 10, 2);
            $table->unsignedTinyInteger('id_ocakavana_platba_typ')->nullable();
            $table->date('datum_ocakavanej_platby');
            $table->unsignedInteger('id_rodic')->nullable();
            $table->unsignedInteger('id_dieta')->nullable();
            $table->unsignedInteger('id_projekt')->nullable();
            $table->unsignedInteger('id_dosla_platba')->nullable();
            $table->date('datum_priradenia');
            $table->text('poznamka')->nullable();
            $table->timestamps();

            $table->foreign('id_ocakavana_platba_typ')->references('id')->on('ocakavana_platba_typ');
            $table->foreign('id_rodic')->references('id')->on('rodic');
            $table->foreign('id_dieta')->references('id')->on('dieta');
            $table->foreign('id_projekt')->references('id')->on('projekt');
            $table->foreign('id_dosla_platba')->references('id')->on('dosla_platba');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ocakavana_platba');
        Schema::drop('ocakavana_platba_typ');

        Schema::drop('dosla_platba');
        Schema::drop('dosla_platba_stav');
    }
}
