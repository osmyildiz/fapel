<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            // Çorba Örnekleri
            [
                'category_id' => 2,
                'name_tr' => 'Mercimek Çorbası',
                'name_en' => 'Lentil Soup',
                'name_ar' => 'شوربة العدس',
                'img'=>'assets1/images/project/sm-01.jpg',
                'description_tr' => 'Geleneksel Türk mercimek çorbası, limon ile servis edilir.',
                'description_en' => 'Traditional Turkish lentil soup, served with lemon.',
                'description_ar' => 'شوربة العدس التركية التقليدية، تقدم مع الليمون.',
                'price' => 120.00,
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Mercimek Çorbası | Geleneksel Türk Çorbası',
                'seo_description_tr' => 'Limon ile servis edilen geleneksel Türk mercimek çorbasını keşfedin.',
                'seo_keywords_tr' => 'mercimek çorbası, Türk çorbası, limonlu çorba',

                'seo_title_en' => 'Lentil Soup | Traditional Turkish Soup',
                'seo_description_en' => 'Discover the traditional Turkish lentil soup served with lemon.',
                'seo_keywords_en' => 'lentil soup, Turkish soup, soup with lemon',
                // Arabic

                'seo_title_ar' => 'شوربة العدس | شوربة تركية تقليدية',
                'seo_description_ar' => 'اكتشف شوربة العدس التركية التقليدية التي تقدم مع الليمون.',
                'seo_keywords_ar' => 'شوربة العدس, شوربة تركية, شوربة مع ليمون',

            ],
            [
                'category_id' => 2,
                'name_tr' => 'Tarhana Çorbası',
                'name_en' => 'Tarhana Soup',
                'name_ar' => 'شوربة ترهانا',
                'img'=>'assets1/images/project/sm-02.jpg',
                'description_tr' => 'Kurutulmuş yoğurt ve un karışımından yapılan geleneksel Türk çorbası.',
                'description_en' => 'Traditional Turkish soup made from a dried mix of yogurt and flour.',
                'description_ar' => 'شوربة تركية تقليدية مصنوعة من مزيج مجفف من الزبادي والطحين.',
                'price' => 120.00,
                'is_active' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Tarhana Çorbası | Yoğurt ve Un Karışımıyla',
                'seo_description_tr' => 'Kurutulmuş yoğurt ve un karışımından yapılan geleneksel Türk Tarhana çorbası.',
                'seo_keywords_tr' => 'tarhana çorbası, yoğurtlu çorba, geleneksel Türk çorbası',
                'seo_title_en' => 'Tarhana Soup | Made with Yogurt and Flour Mix',
                'seo_description_en' => 'Discover the traditional Turkish Tarhana soup made from a dried mix of yogurt and flour.',
                'seo_keywords_en' => 'tarhana soup, yogurt soup, traditional Turkish soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة ترهانا | مصنوعة من مزيج الزبادي والطحين',
                'seo_description_ar' => 'اكتشف شوربة ترهانا التركية التقليدية المصنوعة من مزيج مجفف من الزبادي والطحين.',
                'seo_keywords_ar' => 'شوربة ترهانا, شوربة الزبادي, شوربة تركية تقليدية'


            ],
            [
                'category_id' => 2,
                'name_tr' => 'Yayla Çorbası',
                'name_en' => 'Yayla Soup',
                'name_ar' => 'شوربة يايلا',
                'img'=>'assets1/images/project/sm-03.jpg',
                'description_tr' => 'Yoğurt ve pirinçle hazırlanan, nane ve tereyağı ile tatlandırılan Türk çorbası.',
                'description_en' => 'Turkish soup prepared with yogurt and rice, flavored with mint and butter.',
                'description_ar' => 'شوربة تركية مصنوعة من الزبادي والأرز، مع نكهة النعناع والزبدة.',
                'price' => 120.00,
                'is_active' => 1,
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],

            // Ara Yemek Örnekleri
            [
                'category_id' => 3,
                'name_tr' => 'Çılbır',
                'name_en' => 'Çılbır',
                'name_ar' => 'تشيلبير',
                'img'=>'assets1/images/project/sm-04.jpg',
                'description_tr' => 'Yoğurt ve baharatlı sosla sunulan poşe yumurta.',
                'description_en' => 'Poached eggs served with yogurt and spiced sauce.',
                'description_ar' => 'بيض مسلوق يقدم مع الزبادي وصلصة بهارات.',
                'price' => 130.00,
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Patlıcan Salatası | Közlenmiş Patlıcanın Enfes Uyumu',
                'seo_description_tr' => 'Közlenmiş patlıcan, biber ve domatesin mükemmel uyumuyla hazırlanan leziz bir salata.',
                'seo_keywords_tr' => 'patlıcan salatası, közlenmiş patlıcan, Türk salatası',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
            [
                'category_id' => 3,
                'name_tr' => 'Patlıcan Salatası',
                'name_en' => 'Eggplant Salad',
                'name_ar' => 'سلطة الباذنجان',
                'img'=>'assets1/images/project/sm-05.jpg',
                'description_tr' => 'Közlenmiş patlıcan, biber ve domatesle hazırlanan lezzetli salata.',
                'description_en' => 'Delicious salad prepared with roasted eggplant, pepper, and tomato.',
                'description_ar' => 'سلطة لذيذة مصنوعة من الباذنجان المشوي والفلفل والطماطم.',
                'price' => 130.00,
                'is_active' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Patlıcan Salatası | Közlenmiş Patlıcanın Enfes Uyumu',
                'seo_description_tr' => 'Közlenmiş patlıcan, biber ve domatesin mükemmel uyumuyla hazırlanan leziz bir salata.',
                'seo_keywords_tr' => 'patlıcan salatası, közlenmiş patlıcan, Türk salatası',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
            [
                'category_id' => 3,
                'name_tr' => 'Haydari',
                'name_en' => 'Haydari',
                'name_ar' => 'حيدري',
                'img'=>'assets1/images/project/sm-06.jpg',
                'description_tr' => 'Yoğurt, sarımsak ve baharatlarla hazırlanan soğuk meze.',
                'description_en' => 'Cold appetizer made with yogurt, garlic, and spices.',
                'description_ar' => 'مقبلات باردة مصنوعة من الزبادي والثوم والتوابل.',
                'price' => 130.00,
                'is_active' => 1,
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Patlıcan Salatası | Közlenmiş Patlıcanın Enfes Uyumu',
                'seo_description_tr' => 'Közlenmiş patlıcan, biber ve domatesin mükemmel uyumuyla hazırlanan leziz bir salata.',
                'seo_keywords_tr' => 'patlıcan salatası, közlenmiş patlıcan, Türk salatası',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],

            // Ana Yemek Örnekleri
            [
                'category_id' => 4,
                'name_tr' => 'İskender Kebap',
                'name_en' => 'İskender Kebab',
                'name_ar' => 'كباب إسكندر',
                'img'=>'assets1/images/project/sm-07.jpg',
                'description_tr' => 'Özel sosla sunulan ince doğranmış döner eti, üzerinde yoğurt ve tereyağı ile.',
                'description_en' => 'Thinly sliced doner meat served with a special sauce, topped with yogurt and melted butter.',
                'description_ar' => 'لحم الدونر المقطع بشكل رفيع يقدم مع صلصة خاصة، مع الزبادي والزبدة المذابة فوقه.',
                'price' => 360.00,
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'İskender Kebap | Özel Sosla Sunulan Efsane Lezzet',
                'seo_description_tr' => 'Özel sos, yoğurt ve tereyağının ince döner etiyle buluştuğu eşsiz bir lezzet: İskender Kebap.',
                'seo_keywords_tr' => 'İskender kebap, döner, Türk kebabı',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
            [
                'category_id' => 4,
                'name_tr' => 'Kuzu Tandır',
                'name_en' => 'Lamb Tandoor',
                'name_ar' => 'طنجرة الضأن',
                'img'=>'assets1/images/project/sm-08.jpg',
                'description_tr' => 'Yavaşça pişirilmiş yumuşacık kuzu eti.',
                'description_en' => 'Softly cooked, tender lamb meat.',
                'description_ar' => 'لحم الضأن المطهو ببطء والطري.',
                'price' => 380.00,
                'is_active' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'İskender Kebap | Özel Sosla Sunulan Efsane Lezzet',
                'seo_description_tr' => 'Özel sos, yoğurt ve tereyağının ince döner etiyle buluştuğu eşsiz bir lezzet: İskender Kebap.',
                'seo_keywords_tr' => 'İskender kebap, döner, Türk kebabı',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
            [
                'category_id' => 4,
                'name_tr' => 'Kebap',
                'name_en' => 'Kebab',
                'name_ar' => 'كباب',
                'img'=>'assets1/images/project/sm-01.jpg',
                'description_tr' => 'Baharatlarla marine edilmiş etin mangalda pişirilmiş hali.',
                'description_en' => 'Meat marinated with spices and grilled to perfection.',
                'description_ar' => 'لحم تمت تتبيله بالتوابل وشواءه حتى الكمال.',
                'price' => 370.00,
                'is_active' => 1,
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'İskender Kebap | Özel Sosla Sunulan Efsane Lezzet',
                'seo_description_tr' => 'Özel sos, yoğurt ve tereyağının ince döner etiyle buluştuğu eşsiz bir lezzet: İskender Kebap.',
                'seo_keywords_tr' => 'İskender kebap, döner, Türk kebabı',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],

            // Tatlı Örnekleri
            [
                'category_id' => 5,
                'name_tr' => 'Baklava',
                'name_en' => 'Baklava',
                'name_ar' => 'بقلاوة',
                'img'=>'assets1/images/project/sm-02.jpg',
                'description_tr' => 'Fındık ve şerbetle hazırlanan ince yufkalı tatlı.',
                'description_en' => 'Thin pastry dessert made with hazelnuts and syrup.',
                'description_ar' => 'حلوى رقيقة مصنوعة من البندق والشراب.',
                'price' => 140.00,
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Baklava | Fındık ve Şerbetin Tatlı Dansı',
                'seo_description_tr' => 'Fındık ve şerbetin ince yufka arasında mükemmel uyumuyla sunulan geleneksel Türk tatlısı.',
                'seo_keywords_tr' => 'baklava, fındıklı tatlı, şerbetli tatlı',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
            [
                'category_id' => 5,
                'name_tr' => 'Künefe',
                'name_en' => 'Künefe',
                'name_ar' => 'كُنافة',
                'img'=>'assets1/images/project/sm-03.jpg',
                'description_tr' => 'Peynirli tatlı, üzerine şerbet ve fıstık ile servis edilir.',
                'description_en' => 'Sweet pastry with cheese, served with syrup and pistachios on top.',
                'description_ar' => 'حلوى بالجبن، تقدم مع الشراب والفستق على القمة.',
                'price' => 150.00,
                'is_active' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Künefe | Peynirli Tatlıların Kralı',
                'seo_description_tr' => 'Peynirin tatlı kadayıf telkadayıfı ve şerbetle buluştuğu, üzerine fıstığın serpildiği bir lezzet şöleni.',
                'seo_keywords_tr' => 'künefe, peynirli tatlı, kadayıf tatlısı',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
            [
                'category_id' => 5,
                'name_tr' => 'Sütlaç',
                'name_en' => 'Rice Pudding',
                'name_ar' => 'أرز بالحليب',
                'img'=>'assets1/images/project/sm-04.jpg',
                'description_tr' => 'Sütlü ve pirinçle hazırlanan klasik Türk tatlısı.',
                'description_en' => 'Classic Turkish dessert made with milk and rice.',
                'description_ar' => 'حلوى تركية كلاسيكية مصنوعة من الحليب والأرز.',
                'price' => 140.00,
                'is_active' => 1,
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'seo_title_tr' => 'Künefe | Peynirli Tatlıların Kralı',
                'seo_description_tr' => 'Peynirin tatlı kadayıf telkadayıfı ve şerbetle buluştuğu, üzerine fıstığın serpildiği bir lezzet şöleni.',
                'seo_keywords_tr' => 'künefe, peynirli tatlı, kadayıf tatlısı',
                'seo_title_tr' => 'Çılbır | Yoğurt ve Baharatlı Sosla Sunulan Özel Yemek',
                'seo_description_tr' => 'Poşe yumurtanın yoğurt ve baharatlı sosla buluştuğu eşsiz bir lezzet: Çılbır.',
                'seo_keywords_tr' => 'çılbır, poşe yumurta, yoğurtlu sos',
                'seo_title_en' => 'Yayla Soup | Flavored with Mint and Butter',
                'seo_description_en' => 'Savor the unique taste of Yayla Soup, a traditional Turkish delicacy made with yogurt and rice, accentuated by mint and butter.',
                'seo_keywords_en' => 'yayla soup, Turkish soup, yogurt and rice soup, mint flavored soup',
                // Arabic SEO
                'seo_title_ar' => 'شوربة يايلا | مع نكهة النعناع والزبدة',
                'seo_description_ar' => 'استمتع بطعم شوربة يايلا التركية التقليدية المصنوعة من الزبادي والأرز والمعززة بالنعناع والزبدة.',
                'seo_keywords_ar' => 'شوربة يايلا, شوربة تركية, شوربة الزبادي والأرز, شوربة بنكهة النعناع'

            ],
        ]);
    }
}
