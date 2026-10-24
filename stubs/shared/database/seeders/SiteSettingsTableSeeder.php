<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
