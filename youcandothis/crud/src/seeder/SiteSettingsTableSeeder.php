<?php

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            'title' => 'Title of admin panel',
            'email' => 'admin@gmail.com',
            'phone_1' => '9988776655',
            'phone_2' => '9988776655',
            'site_visitors' => '101',
            'copy_right' => '9988776655',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}
