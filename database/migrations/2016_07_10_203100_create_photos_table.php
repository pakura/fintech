<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gallery_id');
            $table->unsignedInteger('position')->default(1);
            $table->boolean('visible')->default(1);
            $table->string('file', 800)->nullable();
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries');
        });

        Schema::create('photo_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('photo_id');
            $table->char('language', 2);
            $table->string('title');
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_languages');

        Schema::dropIfExists('photos');
    }
}
