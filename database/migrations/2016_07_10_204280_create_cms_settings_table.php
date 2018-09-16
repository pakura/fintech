<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_settings', function (Blueprint $table) {
            $table->tinyInteger('id', true);
            $table->unsignedInteger('cms_user_id');
            $table->string('sidebar_position', 64)->default('fixed');
            $table->string('sidebar_direction', 64)->default('left-sidebar');
            $table->boolean('horizontal_menu')->default(0);
            $table->string('horizontal_menu_minimal', 64)->nullable();
            $table->string('horizontal_menu_click', 64)->nullable();
            $table->string('skin_sidebar', 64)->nullable();
            $table->string('skin_user_menu', 64)->nullable();
            $table->string('skin_horizontal', 64)->nullable();
            $table->string('skin_login', 64)->nullable();
            $table->string('layout_boxed', 64)->nullable();
            $table->string('alert_position', 64)->default('top-right');
            $table->string('ajax_form', 64)->default('ajax-form');
            $table->string('lockscreen')->default('0');
            $table->timestamps();

            $table->foreign('cms_user_id')->references('id')->on('cms_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_settings');
    }
}
