<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprava extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprava_typ', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('sprava_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('sprava', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('id_sprava_typ')->nullable();
            $table->unsignedInteger('id_dieta')->nullable();
            $table->unsignedInteger('id_rodic')->nullable();
            $table->unsignedTinyInteger('id_sposob_dorucenia')->nullable();
            $table->unsignedSmallInteger('id_jazyk')->nullable();
            $table->unsignedInteger('id_prekladatel')->nullable();
            $table->unsignedTinyInteger('id_sprava_stav')->nullable();
            $table->date('datum_nastavenia_stavu')->nullable();
            $table->date('datum_prijatia')->nullable();
            $table->date('datum_odoslania_prekladatelovi')->nullable();
            $table->text('poznamka')->nullable();
            $table->longText('text')->nullable();
            $table->longText('prelozeny_text')->nullable();
            $table->timestamps();
            $table->foreign('id_sprava_typ')->references('id')->on('sprava_typ');
            $table->foreign('id_dieta')->references('id')->on('dieta');
            $table->foreign('id_rodic')->references('id')->on('rodic');
            $table->foreign('id_sposob_dorucenia')->references('id')->on('sposob_dorucenia');
            $table->foreign('id_jazyk')->references('id')->on('jazyk');
            $table->foreign('id_prekladatel')->references('id')->on('prekladatel');
            $table->foreign('id_sprava_stav')->references('id')->on('sprava_stav');
        });

        Schema::create('sprava_stav_historia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sprava')->index();
            $table->unsignedTinyInteger('id_sprava_stav')->index();
            $table->date('datum_nastavenia_stavu');
            $table->timestamps();
            $table->foreign('id_sprava')->references('id')->on('sprava');
            $table->foreign('id_sprava_stav')->references('id')->on('sprava_stav');
        });

        Schema::create('sprava_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_sprava')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_sprava')->references('id')->on('sprava')->onDelete('cascade');
            $table->foreign('id_subor')->references('id')->on('subor')->onDelete('cascade');
        });

        Schema::create('sprava_prelozeny_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_sprava')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_sprava')->references('id')->on('sprava')->onDelete('cascade');
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
        Schema::drop('sprava_prelozeny_subor');
        Schema::drop('sprava_subor');
        Schema::drop('sprava_stav_historia');
        Schema::drop('sprava');
        Schema::drop('sprava_stav');
        Schema::drop('sprava_typ');
    }
}
