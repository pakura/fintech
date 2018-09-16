<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type', 32);
            $table->string('admin_order_by', 32)->default('id');
            $table->string('admin_sort', 16)->default('desc');
            $table->tinyInteger('admin_per_page')->default(20);
            $table->string('web_order_by', 32)->default('id');
            $table->string('web_sort', 16)->default('desc');
            $table->tinyInteger('web_per_page')->default(10);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('collections');
    }
}
