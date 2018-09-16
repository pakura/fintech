<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gallery_id');
            $table->unsignedInteger('position')->default(1);
            $table->boolean('visible')->default(1);
            $table->string('file', 800)->nullable();
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
        });

        Schema::create('video_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('video_id');
            $table->char('language', 2);
            $table->string('title');
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_languages');

        Schema::dropIfExists('videos');
    }
}
