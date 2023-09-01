<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seo')->insert([
            [
                'page_name' => 'home',
                'title_tr' => 'Fapel Restaurant - Enfes Anadolu Lezzetleri',
                'title_en' => 'Fapel Restaurant - Delicious Anatolian Flavors',
                'title_ar' => 'مطعم فابيل - نكهات أناضولية لذيذة',
                'description_tr' => 'Fapel Restaurant, Anadolu mutfağının en seçkin lezzetlerini sunmaktadır. Urfalıların eşsiz misafirperverliğiyle birleştirilmiş benzersiz bir deneyim için bizi ziyaret edin.',
                'description_en' => 'Fapel Restaurant offers the finest flavors of Anatolian cuisine. Visit us for a unique experience combined with the unparalleled hospitality of the people of Urfa.',
                'description_ar' => 'يقدم مطعم فابيل أفضل نكهات المأكولات الأناضولية. قم بزيارتنا لتجربة فريدة تجمع بين حسن ضيافة أهل أورفا.',
                'canonical_tr' => 'https://fapel.com.tr/ana-sayfa',
                'canonical_en' => 'https://fapel.com.tr/home-page',
                'canonical_ar' => 'https://fapel.com.tr/الصفحة-الرئيسية',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'ana sayfa, restoran, fapel, Anadolu mutfağı, Urfalı lezzetler',
                'keywords_en' => 'home page, restaurant, fapel, Anatolian cuisine, Urfa flavors',
                'keywords_ar' => 'الصفحة الرئيسية, مطعم, فابيل, المأكولات الأناضولية, نكهات أورفا',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'aboutus',
                'title_tr' => 'Fapel Restaurant - Ata Mirasıyla Lezzet Yolculuğu',
                'title_en' => 'Fapel Restaurant - A Flavor Journey with Ancestral Heritage',
                'title_ar' => 'مطعم فابيل - رحلة النكهات مع التراث الأنسابي',
                'description_tr' => 'Fapel Restaurant, ata mirası ve baba yadigarı mesleğiyle, Anadolu yemeklerini mükemmeliyetle sunmaktadır.',
                'description_en' => 'Fapel Restaurant, with its ancestral heritage and family trade, impeccably presents Anatolian dishes.',
                'description_ar' => 'يقدم مطعم فابيل المأكولات الأناضولية بكمالها مع التراث الأنسابي والتجارة العائلية.',
                'canonical_tr' => 'https://fapel.com.tr/hakkimizda',
                'canonical_en' => 'https://fapel.com.tr/about-us',
                'canonical_ar' => 'https://fapel.com.tr/معلومات-عنا',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'hakkımızda, restoran, fapel, Anadolu tarihi, Urfalı geleneği',
                'keywords_en' => 'about us, restaurant, fapel, Anatolian history, Urfa tradition',
                'keywords_ar' => 'معلومات عنا, مطعم, فابيل, تاريخ أناضول, تقاليد أورفا',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'contact',
                'title_tr' => 'Fapel Restaurant - Bize Ulaşın',
                'title_en' => 'Fapel Restaurant - Contact Us',
                'title_ar' => 'مطعم فابيل - اتصل بنا',
                'description_tr' => 'Fapel Restaurant ile iletişime geçin. 3 şubemiz: Florya, Ataköy, Cevizlibağ\'da hizmetinizdeyiz.',
                'description_en' => 'Reach out to Fapel Restaurant. Serving you at our 3 branches: Florya, Ataköy, Cevizlibağ.',
                'description_ar' => 'تواصل مع مطعم فابيل. نخدمك في ثلاثة فروع: فلوريا، أتاكوي، جيفيزليباغ.',
                'canonical_tr' => 'https://fapel.com.tr/iletisim',
                'canonical_en' => 'https://fapel.com.tr/contact',
                'canonical_ar' => 'https://fapel.com.tr/اتصل-بنا',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'iletişim, restoran, fapel, Florya, Ataköy, Cevizlibağ',
                'keywords_en' => 'contact, restaurant, fapel, Florya, Ataköy, Cevizlibağ',
                'keywords_ar' => 'اتصال, مطعم, فابيل, فلوريا, أتاكوي, جيفيزليباغ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Rezervasyon için
            [
                'page_name' => 'reservation',
                'title_tr' => 'Fapel Restaurant - Rezervasyon Yapın',
                'title_en' => 'Fapel Restaurant - Make a Reservation',
                'title_ar' => 'مطعم فابيل - قم بالحجز',
                'description_tr' => 'Fapel Restaurant\'ta yerinizi ayırtın. Florya, Ataköy, Cevizlibağ şubelerimizde sizleri bekliyoruz.',
                'description_en' => 'Book your spot at Fapel Restaurant. We await you at our branches in Florya, Ataköy, and Cevizlibağ.',
                'description_ar' => 'احجز مكانك في مطعم فابيل. ننتظركم في فروعنا في فلوريا، أتاكوي، وجيفيزليباغ.',
                'canonical_tr' => 'https://fapel.com.tr/rezervasyon',
                'canonical_en' => 'https://fapel.com.tr/reservation',
                'canonical_ar' => 'https://fapel.com.tr/الحجز',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'rezervasyon, restoran, fapel, Florya, Ataköy, Cevizlibağ',
                'keywords_en' => 'reservation, restaurant, fapel, Florya, Ataköy, Cevizlibağ',
                'keywords_ar' => 'الحجز, مطعم, فابيل, فلوريا, أتاكوي, جيفيزليباغ',
                'created_at' => now(),
                'updated_at' => now(),
            ],

// Blog için
            [
                'page_name' => 'blog',
                'title_tr' => 'Fapel Restaurant - Blog',
                'title_en' => 'Fapel Restaurant - Blog',
                'title_ar' => 'مطعم فابيل - المدونة',
                'description_tr' => 'Fapel Restaurant\'ın en son haberleri, etkinlikleri ve lezzetli yemek tarifleri.',
                'description_en' => 'Latest news, events, and delicious recipes from Fapel Restaurant.',
                'description_ar' => 'أحدث الأخبار والفعاليات ووصفات الطعام اللذيذة من مطعم فابيل.',
                'canonical_tr' => 'https://fapel.com.tr/blog',
                'canonical_en' => 'https://fapel.com.tr/blog',
                'canonical_ar' => 'https://fapel.com.tr/المدونة',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'blog, restoran, fapel, Florya, Ataköy, Cevizlibağ, tarifler, haberler',
                'keywords_en' => 'blog, restaurant, fapel, Florya, Ataköy, Cevizlibağ, recipes, news',
                'keywords_ar' => 'المدونة, مطعم, فابيل, فلوريا, أتاكوي, جيفيزليباغ, وصفات, أخبار',
                'created_at' => now(),
                'updated_at' => now(),
            ],

// Menü için
            [
                'page_name' => 'menu',
                'title_tr' => 'Fapel Restaurant - Menü',
                'title_en' => 'Fapel Restaurant - Menu',
                'title_ar' => 'مطعم فابيل - القائمة',
                'description_tr' => 'Fapel Restaurant\'ın eşsiz lezzetleri. Florya, Ataköy, Cevizlibağ şubelerimizde tadına bakabilirsiniz.',
                'description_en' => 'Unique flavors of Fapel Restaurant. Taste them at our branches in Florya, Ataköy, and Cevizlibağ.',
                'description_ar' => 'نكهات فريدة من مطعم فابيل. جربها في فروعنا في فلوريا، أتاكوي، وجيفيزليباغ.',
                'canonical_tr' => 'https://fapel.com.tr/menu',
                'canonical_en' => 'https://fapel.com.tr/menu',
                'canonical_ar' => 'https://fapel.com.tr/القائمة',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'menü, restoran, fapel, Florya, Ataköy, Cevizlibağ, yemekler',
                'keywords_en' => 'menu, restaurant, fapel, Florya, Ataköy, Cevizlibağ, dishes',
                'keywords_ar' => 'القائمة, مطعم, فابيل, فلوريا, أتاكوي, جيفيزليباغ, أطعمة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'gallery',
                'title_tr' => 'Fapel Restaurant - Anadolu Mutfağının Görsel Ziyafeti',
                'title_en' => 'Fapel Restaurant - Visual Feast of Anatolian Cuisine',
                'title_ar' => 'مطعم فابيل - عرض بصري للمأكولات الأناضولية',
                'description_tr' => 'Fapel Restaurant galerimizde, Anadolu mutfağının en lezzetli yemeklerinin görsel ziyafetini keşfedin. Geleneksel yemeklerimizin benzersiz sunumlarına göz atın.',
                'description_en' => 'Discover the visual feast of the most delicious dishes of Anatolian cuisine in our Fapel Restaurant gallery. Take a look at the unique presentations of our traditional dishes.',
                'description_ar' => 'اكتشف عرض المأكولات الأناضولية اللذيذة في معرض مطعم فابيل. تعرف على العروض الفريدة لأطعمتنا التقليدية.',
                'canonical_tr' => 'https://fapel.com.tr/galeri',
                'canonical_en' => 'https://fapel.com.tr/gallery',
                'canonical_ar' => 'https://fapel.com.tr/المعرض',
                'twitter_name' => '@fapelcom',
                'logo_url' => 'https://www.fapel.com.tr/assets1/images/logo/fapel-restaurant-logo.png',
                'keywords_tr' => 'galeri, restoran, fapel, Anadolu mutfağı, fotoğraflar, yemek sunumları',
                'keywords_en' => 'gallery, restaurant, fapel, Anatolian cuisine, photos, food presentations',
                'keywords_ar' => 'معرض, مطعم, فابيل, المأكولات الأناضولية, الصور, تقديم الطعام',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);

    }
}
