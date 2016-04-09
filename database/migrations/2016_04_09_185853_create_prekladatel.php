<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrekladatel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prekladatel_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('sposob_dorucenia', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('jazyk', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('prekladatel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oslovenie')->nullable();
            $table->string('meno')->nullable();
            $table->string('priezvisko')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->unsignedTinyInteger('id_sposob_dorucenia')->nullable();
            $table->unsignedInteger('id_adresa')->nullable();
            $table->text('poznamka')->nullable();
            $table->unsignedTinyInteger('id_prekladatel_stav')->nullable();
            $table->timestamps();
            $table->foreign('id_prekladatel_stav')->references('id')->on('prekladatel_stav');
            $table->foreign('id_adresa')->references('id')->on('adresa');
            $table->foreign('id_sposob_dorucenia')->references('id')->on('sposob_dorucenia');
        });

        Schema::create('jazyk_prekladatel', function (Blueprint $table) {
            $table->unsignedInteger('id_prekladatel')->index();
            $table->unsignedSmallInteger('id_jazyk')->index();
            $table->foreign('id_prekladatel')->references('id')->on('prekladatel')->onDelete('cascade');
            $table->foreign('id_jazyk')->references('id')->on('jazyk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jazyk_prekladatel');
        Schema::drop('prekladatel');
        Schema::drop('jazyk');
        Schema::drop('sposob_dorucenia');
        Schema::drop('prekladatel_stav');
    }
}
