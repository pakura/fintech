<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collection_id');
            $table->string('slug');
            $table->unsignedInteger('position')->default(1);
            $table->boolean('visible')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections');
        });

        Schema::create('article_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id');
            $table->char('language', 2);
            $table->string('title');
            $table->text('description')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('meta_desc')->nullable();
            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_languages');

        Schema::dropIfExists('articles');
    }
}
