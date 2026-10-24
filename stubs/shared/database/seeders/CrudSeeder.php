<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CrudSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(ExtrasTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
    }
}
