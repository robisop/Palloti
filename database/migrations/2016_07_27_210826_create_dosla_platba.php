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
        Schema::create('dosla_platba', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iban', 50);
            $table->string('vs', 10);
            $table->string('nazov');
            $table->string('poznamka');
            $table->text('popis');
            $table->date('datum_platby');
            $table->date('datum_spracovania');
            $table->unsignedTinyInteger('id_dosla_platba_stav')->nullable();
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
        Schema::drop('dosla_platba');
    }
}
