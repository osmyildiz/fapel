<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $turkYemekleriId = DB::table('blog_categories')->where('slug_tr', 'turk-yemekleri')->first()->id;
        $turkTatlilariId = DB::table('blog_categories')->where('slug_tr', 'turk-tatlilari')->first()->id;

        // Blog İçerikleri ekle
        DB::table('blog_posts')->insert([
            [
                'category_id' => $turkYemekleriId,
                'title_tr' => 'Fapel’in Anadolu Mutfağına Yaklaşımı',
                'slug_tr' => Str::slug('Fapel’in Anadolu Mutfağına Yaklaşımı'),
                'title_en' => 'Fapel\'s Approach to Anatolian Cuisine',
                'slug_en' => Str::slug('Fapel\'s Approach to Anatolian Cuisine'),
                'title_ar' => 'أفابل ونهجها في المأكولات الأناضولية',
                'slug_ar' => Str::slug('أفابل ونهجها في المأكولات الأناضولية'),
                'content_tr' => 'Fapel, yılların deneyimi ve birikimiyle Anadolu mutfağının zengin çeşitlerini özenle sunar...',
                'content_en' => 'Fapel, with years of experience and accumulation, meticulously presents the rich varieties of Anatolian cuisine...',
                'content_ar' => 'تقوم أفابل بتقديم أصناف المأكولات الأناضولية الغنية بدقة بفضل سنوات من الخبرة والتراكم...',
                'is_active' => 1,
                'priority' => 1,
                'img' => "assets1/images/blog/blog-04-1.jpg",
                'img_home' => "assets1/images/blog/blog-04.jpg",

                // Türkçe SEO
                'seo_title_tr' => 'Fapel’in Anadolu Mutfağına Ozel Yaklaşımı',
                'seo_description_tr' => 'Fapel, yılların deneyimi ile Anadolu mutfağının zenginliklerini sunar. Urfalıların damak zevkine hitap eden lezzetler ve daha fazlası.',
                'seo_keywords_tr' => 'Fapel, Anadolu Mutfağı, Urfalı yemekler, özgün lezzetler',

                // İngilizce SEO
                'seo_title_en' => 'Fapel\'s Unique Approach to Anatolian Cuisine',
                'seo_description_en' => 'Fapel presents the richness of Anatolian cuisine with years of experience. Catering to Urfa\'s unique tastes and more.',
                'seo_keywords_en' => 'Fapel, Anatolian Cuisine, Urfa dishes, authentic flavors',

                // Arapça SEO
                'seo_title_ar' => 'أفابل ومقاربتها الفريدة للمأكولات الأناضولية',
                'seo_description_ar' => 'تقدم أفابل غنى المأكولات الأناضولية مع سنوات من الخبرة. تقديم أطعمة تناسب ذوق أورفا وأكثر من ذلك.',
                'seo_keywords_ar' => 'أفابل، المأكولات الأناضولية، أطعمة أورفا، نكهات أصيلة',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'category_id' => $turkYemekleriId,
                'title_tr' => 'Hz. İbrahim’in Misafirperverliği ve Fapel',
                'slug_tr' => Str::slug('Hz. İbrahim’in Misafirperverliği ve Fapel'),
                'title_en' => 'Prophet Ibrahim’s Hospitality and Fapel',
                'slug_en' => Str::slug('Prophet Ibrahim’s Hospitality and Fapel'),
                'title_ar' => 'ضيافة النبي إبراهيم وأفابل',
                'slug_ar' => Str::slug('ضيافة النبي إبراهيم وأفابل'),
                'content_tr' => 'Misafirperverlik, Anadolu kültürünün en önemli değerlerinden...',
                'content_en' => 'Hospitality is one of the most significant values of Anatolian culture...',
                'content_ar' => 'الضيافة هي واحدة من أهم قيم الثقافة الأناضولية...',
                'is_active' => 1,
                'priority' => 2,
                'img' => "assets1/images/blog/blog-02-1.jpg",
                'img_home' => "assets1/images/blog/blog-02.jpg",
                'created_at' => now(),
                'updated_at' => now(),

                // Türkçe SEO
                'seo_title_tr' => 'Hz. İbrahim ve Anadolu Misafirperverliği - Fapel',
                'seo_description_tr' => 'Hz. İbrahim’in misafirsiz masaya oturmama geleneği ve Fapel ailesinin bu geleneği yaşatma azmi. Anadolu’nun sıcak misafirperverliğini Fapel ile keşfedin.',
                'seo_keywords_tr' => 'Hz. İbrahim, Misafirperverlik, Fapel, Anadolu Kültürü',

                // İngilizce SEO
                'seo_title_en' => 'Prophet Ibrahim and Anatolian Hospitality - Fapel',
                'seo_description_en' => 'Prophet Ibrahim’s tradition of dining with guests and Fapel family’s dedication to continue this. Explore the warmth of Anatolian hospitality with Fapel.',
                'seo_keywords_en' => 'Prophet Ibrahim, Hospitality, Fapel, Anatolian Culture',

                // Arapça SEO
                'seo_title_ar' => 'النبي إبراهيم وضيافة أناضول - أفابل',
                'seo_description_ar' => 'تقليد النبي إبراهيم في تناول الطعام مع الضيوف وتقديم الأطعمة المميزة من قبل عائلة أفابل. استمتع بحرارة الضيافة الأناضولية مع أفابل.',
                'seo_keywords_ar' => 'النبي إبراهيم، ضيافة، أفابل، ثقافة أناضول'
            ]
,
            [
                'category_id' => $turkTatlilariId,
                'title_tr' => 'Fapel’in Geleneksel Künefe Sunumu ve Anadolu Tatlıları',
                'slug_tr' => Str::slug('Fapel’in Geleneksel Künefe Sunumu ve Anadolu Tatlıları'),
                'title_en' => 'Fapel’s Traditional Künefe Presentation and Anatolian Desserts',
                'slug_en' => Str::slug('Fapel’s Traditional Künefe Presentation and Anatolian Desserts'),
                'title_ar' => 'تقديم أفابل التقليدي لكونافة وحلويات أناضول',
                'slug_ar' => Str::slug('تقديم أفابل التقليدي لكونافة وحلويات أناضول'),
                'content_tr' => 'Künefe, Anadolu mutfağının en bilinen tatlılarından biridir. Fapel ailesi olarak, bu eşsiz tatlıyı geleneksel yöntemlerle hazırlıyor ve misafirlerimize sunuyoruz. Künefe sadece bir tatlı değil, aynı zamanda bir sunum sanatıdır. Anadolu’nun zengin tatlı geleneğini sürdüren diğer lezzetlerimizle birlikte, künefemiz misafirlerimize unutulmaz bir tat deneyimi sunar.',
                'content_en' => 'Künefe is one of the most well-known desserts of Anatolian cuisine. As the Fapel family, we prepare this unique dessert using traditional methods and present it to our guests. Künefe is not just a dessert but also an art of presentation. Along with our other delicacies that carry forward Anatolia’s rich dessert tradition, our künefe offers an unforgettable taste experience to our guests.',
                'content_ar' => 'كونافة هي واحدة من أكثر الحلويات شهرة في المأكولات الأناضولية. كعائلة أفابل، نقوم بإعداد هذه الحلوى الفريدة باستخدام الطرق التقليدية ونقدمها لضيوفنا. ليست كونافة مجرد حلوى، بل هي أيضًا فن في العرض. إلى جانب لذائذنا الأخرى التي تواصل تقليد حلويات أناضول الغنية، تقدم كونافتنا تجربة طعم لا تُنسى لضيوفنا.',
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'img' => "assets1/images/blog/blog-03-1.webp",
                'img_home' => "assets1/images/blog/blog-03.jpg",
                // Türkçe SEO
                'seo_title_tr' => 'Hz. İbrahim ve Anadolu Misafirperverliği - Fapel',
                'seo_description_tr' => 'Hz. İbrahim’in misafirsiz masaya oturmama geleneği ve Fapel ailesinin bu geleneği yaşatma azmi. Anadolu’nun sıcak misafirperverliğini Fapel ile keşfedin.',
                'seo_keywords_tr' => 'Hz. İbrahim, Misafirperverlik, Fapel, Anadolu Kültürü',

                // İngilizce SEO
                'seo_title_en' => 'Prophet Ibrahim and Anatolian Hospitality - Fapel',
                'seo_description_en' => 'Prophet Ibrahim’s tradition of dining with guests and Fapel family’s dedication to continue this. Explore the warmth of Anatolian hospitality with Fapel.',
                'seo_keywords_en' => 'Prophet Ibrahim, Hospitality, Fapel, Anatolian Culture',

                // Arapça SEO
                'seo_title_ar' => 'النبي إبراهيم وضيافة أناضول - أفابل',
                'seo_description_ar' => 'تقليد النبي إبراهيم في تناول الطعام مع الضيوف وتقديم الأطعمة المميزة من قبل عائلة أفابل. استمتع بحرارة الضيافة الأناضولية مع أفابل.',
                'seo_keywords_ar' => 'النبي إبراهيم، ضيافة، أفابل، ثقافة أناضول'

            ],
            [
                'category_id' => $turkTatlilariId,
                'title_tr' => 'Baklava: Fapel’in Ustalıkla Hazırladığı Anadolu Lezzeti',
                'slug_tr' => Str::slug('Baklava: Fapel’in Ustalıkla Hazırladığı Anadolu Lezzeti'),
                'title_en' => 'Baklava: The Anatolian Delight Expertly Crafted by Fapel',
                'slug_en' => Str::slug('Baklava: The Anatolian Delight Expertly Crafted by Fapel'),
                'title_ar' => 'البقلاوة: لذيذة أناضول التي تم تحضيرها ببراعة من قبل أفابل',
                'slug_ar' => Str::slug('البقلاوة: لذيذة أناضول التي تم تحضيرها ببراعة من قبل أفابل'),
                'content_tr' => 'Baklava, Anadolu’nun dünyaca ünlü tatlılarından biridir. Kat kat yufkası, arasındaki taze ceviz veya fıstığı ve üzerindeki şerbeti ile eşsiz bir tatlıdır. Fapel ailesi olarak, bu geleneği en iyi şekilde yaşatmak için baklavamızı ustalıkla hazırlıyoruz. Her bir dilimi, Anadolu’nun tatlı geleneğini misafirlerimize taşır.',
                'content_en' => 'Baklava is one of the world-renowned desserts of Anatolia. With its layers of pastry, fresh walnuts or pistachios in between, and the syrup on top, it’s a unique dessert. As the Fapel family, we craft our baklava with expertise to best keep alive this tradition. Each slice brings the dessert tradition of Anatolia to our guests.',
                'content_ar' => 'البقلاوة هي واحدة من الحلويات المشهورة عالميًا في أناضول. مع طبقاتها من العجين، والجوز الطازج أو الفستق بينها، والشراب فوقها، إنها حلوى فريدة من نوعها. كعائلة أفابل، نقوم بإعداد بقلاوتنا بخبرة للحفاظ على هذا التقليد بأفضل شكل. كل شريحة تقدم تقليد حلويات أناضول لضيوفنا.',
                'is_active' => 1,
                'priority' => 2,
                'img' => "assets1/images/blog/blog-04-1.jpg",
                'img_home' => "assets1/images/blog/blog-04.jpg",
                'created_at' => now(),
                'updated_at' => now(),
                // Türkçe SEO
                'seo_title_tr' => 'Hz. İbrahim ve Anadolu Misafirperverliği - Fapel',
                'seo_description_tr' => 'Hz. İbrahim’in misafirsiz masaya oturmama geleneği ve Fapel ailesinin bu geleneği yaşatma azmi. Anadolu’nun sıcak misafirperverliğini Fapel ile keşfedin.',
                'seo_keywords_tr' => 'Hz. İbrahim, Misafirperverlik, Fapel, Anadolu Kültürü',

                // İngilizce SEO
                'seo_title_en' => 'Prophet Ibrahim and Anatolian Hospitality - Fapel',
                'seo_description_en' => 'Prophet Ibrahim’s tradition of dining with guests and Fapel family’s dedication to continue this. Explore the warmth of Anatolian hospitality with Fapel.',
                'seo_keywords_en' => 'Prophet Ibrahim, Hospitality, Fapel, Anatolian Culture',

                // Arapça SEO
                'seo_title_ar' => 'النبي إبراهيم وضيافة أناضول - أفابل',
                'seo_description_ar' => 'تقليد النبي إبراهيم في تناول الطعام مع الضيوف وتقديم الأطعمة المميزة من قبل عائلة أفابل. استمتع بحرارة الضيافة الأناضولية مع أفابل.',
                'seo_keywords_ar' => 'النبي إبراهيم، ضيافة، أفابل، ثقافة أناضول'

            ]
        ]);
    }

}
