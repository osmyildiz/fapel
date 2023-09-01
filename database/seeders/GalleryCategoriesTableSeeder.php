<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gallery_categories')->insert([
            [
                'name_tr' => 'Tümü',
                'name_en' => 'All',
                'name_ar' => 'الكل',
                'slug_tr' => 'hepsi',
                'slug_en' => 'all',
                'slug_ar' => 'alkul',
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
,
            [
                    'name_tr' => 'İç Mekan',
                    'name_en' => 'Indoor',
                    'name_ar' => 'داخلي',
                    'slug_tr' => 'ic-mekan',
                    'slug_en' => 'indoor',
                    'slug_ar' => 'dakhili',
                    'is_active' => 1,
                    'priority' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_tr' => 'Dış Mekan',
                    'name_en' => 'Outdoor',
                    'name_ar' => 'خارجي',
                    'slug_tr' => 'dis-mekan',
                    'slug_en' => 'outdoor',
                    'slug_ar' => 'kharaji',
                    'is_active' => 1,
                    'priority' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            [
                'name_tr' => 'Yemek',
                'name_en' => 'Food',
                'name_ar' => 'طعام',
                'slug_tr' => 'yemek',
                'slug_en' => 'food',
                'slug_ar' => 'taam',
                'is_active' => 1,
                'priority' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
