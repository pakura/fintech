<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->tinyInteger('id', true);
            $table->string('email')->nullable();
            $table->string('phone', 32)->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('map', 800)->nullable();
            $table->timestamps();
        });

        // Insert default row.
        // Seeding in migration, because of triggers constraint.
        DB::table('web_settings')->insert([[]]);

        // Create triggers
        DB::unprepared(
'CREATE TRIGGER `web_settings_insert_not_allowed` BEFORE INSERT ON `web_settings`
FOR EACH ROW BEGIN
    SIGNAL SQLSTATE "45000"
    SET MESSAGE_TEXT = "insert not allowed";
END'
);
        DB::unprepared(
'CREATE TRIGGER `web_settings_delete_not_allowed` BEFORE DELETE ON `web_settings`
FOR EACH ROW BEGIN
    SIGNAL SQLSTATE "45000"
    SET MESSAGE_TEXT = "delete not allowed";
END'
);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_settings');
    }
}
