<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcakavanaPlatba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocakava_platba_typ', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('ocakavana_platba', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('suma', 10, 2);
            $table->unsignedInteger('id_ocakavana_platba_typ');
            $table->unsignedInteger('id_priradena_platba')->nullable();
            $table->text('poznamka')->nullable();
            $table->date('datum_ocakavanej_platby');
            $table->timestamps();

            $table->foreign('id_ocakavana_platba_typ')->references('id')->on('ocakava_platba_typ');
            $table->foreign('id_priradena_platba')->references('id')->on('priradena_platba');
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
        Schema::drop('ocakava_platba_typ');
    }
}
