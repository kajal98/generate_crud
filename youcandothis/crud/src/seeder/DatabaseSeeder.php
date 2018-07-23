<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(ExtrasTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
    }
}
