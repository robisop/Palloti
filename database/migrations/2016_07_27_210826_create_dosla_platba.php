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
