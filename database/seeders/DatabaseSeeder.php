<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MenuCategoriesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(AboutUsTableSeeder::class);
        $this->call(GalleryCategoriesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(SeoSeeder::class);
    }
}
