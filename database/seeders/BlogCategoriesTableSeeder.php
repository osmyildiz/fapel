<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_categories')->insert([
            [
                'name_tr' => 'Türk Yemekleri',
                'name_en' => 'Turkish Dishes',
                'name_ar' => 'الأطعمة التركية',
                'slug_tr' => 'turk-yemekleri',
                'slug_en' => 'turkish-dishes',
                'slug_ar' => 'alatam-turkiya',
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_tr' => 'Türk Tatlıları',
                'name_en' => 'Turkish Desserts',
                'name_ar' => 'حلويات تركية',
                'slug_tr' => 'turk-tatlilari',
                'slug_en' => 'turkish-desserts',
                'slug_ar' => 'halwat-turkiya',
                'is_active' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
