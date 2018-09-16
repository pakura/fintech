<?php

use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends DatabaseSeeder
{
    /**
     * Run notes table seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->truncate();

        DB::table('notes')->insert([
            [
                'title'       => 'სათაური',
                'description' => 'მოკლე აღწერა',
                'content'     => "სათაური\nმოკლე აღწერა\nვრცელი ტექსტი...",
                'created_at'  => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
