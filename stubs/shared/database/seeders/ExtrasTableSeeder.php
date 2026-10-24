<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('extras')->insert([
            'title' => 'terms and conditions',
            'description' => '<p>This is description</p>',
            'code' => 'terms',
            'active' => 1,
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}
