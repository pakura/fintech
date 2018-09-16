<?php

use Illuminate\Support\Facades\DB;

class CmsUsersTableSeeder extends DatabaseSeeder
{
    /**
     * Run cms_users table seeder.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = date('Y-m-d H:i:s');

        DB::table('cms_users')->truncate();

        DB::table('cms_users')->insert([
            [
                'email'      => 'vaja@mobility.ge',
                'firstname'  => 'Vaja',
                'lastname'   => 'Sinauridze',
                'role'       => 'admin',
                'active'     => 1,
                'password'   => '$2y$10$104nOCAkMAcIQGmqpd7fN.I0/7De6VAsBdYgjEBaoevZLYpn2xelu',
                'created_at' => $currentDate
            ]
        ]);

        DB::table('cms_settings')->truncate();

        DB::table('cms_settings')->insert([
            [
                'cms_user_id' => 1,
                'created_at'  => $currentDate
            ]
        ]);
    }
}
