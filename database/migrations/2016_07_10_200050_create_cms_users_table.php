<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('role', 32);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone', 32)->nullable();
            $table->string('address')->nullable();
            $table->boolean('active')->default(1);
            $table->string('photo')->nullable();
            $table->string('password', 128);
            $table->string('remember_token', 128)->nullable();
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
        Schema::dropIfExists('cms_users');
    }
}
