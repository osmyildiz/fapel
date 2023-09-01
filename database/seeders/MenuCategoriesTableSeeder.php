<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_categories')->insert([
            [
                'name_tr' => 'All',
                'name_en' => 'All',
                'name_ar' => 'الكل',
                'slogan_tr' => 'Efsane Lezzetler',
                'slogan_en' => 'Legendary Tastes',
                'slogan_ar' => 'نكهات أسطورية',
                'description_tr' => 'Fapelinin benzersiz ve efsane lezzetlerine hoş geldiniz.',
                'description_en' => 'Welcome to Fapelin\'s unique and legendary flavors.',
        'description_ar' => 'مرحبًا بكم في نكهات Fapelin الفريدة والأسطورية.',
        'is_active' => 1,
        'priority' => 0,
                'created_at' => now(),
                'updated_at' => now(),
    ],
    [
        'name_tr' => 'Çorbalar',
        'name_en' => 'Soups',
        'name_ar' => 'حساء',
        'slogan_tr' => 'Sıcacık Başlangıç',
        'slogan_en' => 'Warm Start',
        'slogan_ar' => 'بداية دافئة',
        'description_tr' => 'Günün her saati için hafif ve besleyici çorbalarımızla tanışın.',
        'description_en' => 'Meet our light and nourishing soups for any time of the day.',
        'description_ar' => 'تعرف على شورباتنا الخفيفة والمغذية في أي وقت من اليوم.',
        'is_active' => 1,
        'priority' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name_tr' => 'Ara Yemekler',
        'name_en' => 'Appetizers',
        'name_ar' => 'فتح الشهية',
        'slogan_tr' => 'Lezzet Patlaması',
        'slogan_en' => 'Flavor Explosion',
        'slogan_ar' => 'انفجار النكهة',
        'description_tr' => 'Birbirinden lezzetli başlangıçlarla sofranızı şenlendirin.',
        'description_en' => 'Enrich your table with delightfully tasty starters.',
        'description_ar' => 'أثري مائدتك بالمقبلات اللذيذة.',
        'is_active' => 1,
        'priority' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name_tr' => 'Ana Yemekler',
        'name_en' => 'Main Courses',
        'name_ar' => 'الأطعمة الرئيسية',
        'slogan_tr' => 'Karnınızı Doyurun',
        'slogan_en' => 'Fill Your Belly',
        'slogan_ar' => 'املأ بطنك',
        'description_tr' => 'Damağınızda iz bırakacak ana yemeklerimizle tanışın.',
        'description_en' => 'Meet our main dishes that will leave a mark on your palate.',
        'description_ar' => 'تعرف على أطباقنا الرئيسية التي ستترك أثرًا في ذائقتك.',
        'is_active' => 1,
        'priority' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name_tr' => 'Tatlılar',
        'name_en' => 'Desserts',
        'name_ar' => 'حلويات',
        'slogan_tr' => 'Mutlu Son',
        'slogan_en' => 'Happy Ending',
        'slogan_ar' => 'الختام مع حلا',
        'description_tr' => 'Gününüzü tatlandıracak enfes tatlılarımızla tanışın.',
        'description_en' => 'Meet our delicious desserts that will sweeten your day.',
        'description_ar' => 'تعرف على حلوياتنا اللذيذة التي ستحلي يومك.',
        'is_active' => 1,
        'priority' => 4,
        'created_at' => now(),
        'updated_at' => now(),

    ],
]);


    }
}
