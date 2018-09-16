<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collection_id');
            $table->string('slug');
            $table->unsignedInteger('position')->default(1);
            $table->string('type', 32);
            $table->boolean('visible')->default(1);
            $table->string('admin_order_by', 32)->default('id');
            $table->string('admin_sort', 16)->default('desc');
            $table->boolean('admin_per_page')->default(20);
            $table->string('web_order_by', 32)->default('id');
            $table->string('web_sort', 16)->default('desc');
            $table->boolean('web_per_page')->default(10);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections');
        });

        Schema::create('gallery_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gallery_id');
            $table->char('language', 2);
            $table->string('title');
            $table->string('meta_desc')->nullable();
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_languages');

        Schema::dropIfExists('galleries');
    }
}
