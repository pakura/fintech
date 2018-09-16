<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id');
            $table->string('slug');
            $table->unsignedInteger('position')->default(1);
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('type', 64)->default('text');
            $table->unsignedInteger('type_id')->nullable();
            $table->string('template', 64)->nullable();
            $table->boolean('visible')->default(1);
            $table->boolean('collapse')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus');
        });

        Schema::create('page_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->char('language', 2);
            $table->string('title');
            $table->string('short_title');
            $table->text('description')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('meta_desc')->nullable();
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_languages');

        Schema::dropIfExists('pages');
    }
}
