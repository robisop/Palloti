<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov');
            $table->text('popis')->nullable();
            $table->string('filename');
            $table->string('extension');
            $table->string('mime_type');
            $table->binary('data');
            $table->timestamps();
        });

        Schema::create('dieta_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_dieta')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_dieta')->references('id')->on('dieta')->onDelete('cascade');
            $table->foreign('id_subor')->references('id')->on('subor')->onDelete('cascade');
        });

        Schema::create('rodic_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_rodic')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_rodic')->references('id')->on('rodic')->onDelete('cascade');
            $table->foreign('id_subor')->references('id')->on('subor')->onDelete('cascade');
        });

        Schema::create('prekladatel_subor', function (Blueprint $table) {
            $table->unsignedInteger('id_prekladatel')->index();
            $table->unsignedInteger('id_subor')->index();
            $table->foreign('id_prekladatel')->references('id')->on('prekladatel')->onDelete('cascade');
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
        Schema::drop('dieta_subor');
        Schema::drop('rodic_subor');
        Schema::drop('prekladatel_subor');
        Schema::drop('subor');
    }
}
