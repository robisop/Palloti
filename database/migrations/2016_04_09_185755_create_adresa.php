<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krajina', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('kod', 2)->unique();
            $table->string('nazov');
            $table->timestamps();
        });

        Schema::create('adresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oslovenie')->nullable();
            $table->string('meno')->nullable();
            $table->string('nazov_spolocnosti')->nullable();
            $table->string('ulica')->nullable();
            $table->string('mesto')->nullable();
            $table->string('psc', 10)->nullable();
            $table->unsignedSmallInteger('id_krajina')->nullable();
            $table->timestamps();
            $table->foreign('id_krajina')->references('id')->on('krajina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adresa');
        Schema::drop('krajina');
    }
}
