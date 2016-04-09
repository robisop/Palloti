<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRodic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rodic_stav', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('sposob_komunikacie', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('rodic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov_spolocnosti')->nullable();
            $table->string('oslovenie')->nullable();
            $table->string('meno')->nullable();
            $table->string('priezvisko')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->string('telefon2')->nullable();
            $table->string('iban', 16)->nullable();
            $table->string('vs', 10)->nullable()->unique()->index();
            $table->unsignedInteger('id_adresa')->nullable();
            $table->text('poznamka')->nullable();
            $table->unsignedTinyInteger('id_rodic_stav')->nullable();
            $table->unsignedTinyInteger('id_sposob_komunikacie')->nullable();
            $table->date('datum_podpisu_zmluvy')->nullable();
            $table->date('datum_ukoncenia_zmluvy')->nullable();
            $table->boolean('posielat_casopis')->nullable();
            $table->boolean('posielat_podakovania')->nullable();
            $table->boolean('je_institucia')->nullable();
            $table->timestamps();
            $table->foreign('id_adresa')->references('id')->on('adresa');
            $table->foreign('id_rodic_stav')->references('id')->on('rodic_stav');
            $table->foreign('id_sposob_komunikacie')->references('id')->on('sposob_komunikacie');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rodic');
        Schema::drop('rodic_stav');
        Schema::drop('sposob_komunikacie');
    }
}
