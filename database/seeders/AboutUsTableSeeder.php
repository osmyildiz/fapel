<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_us')->insert([
            'content_tr' => "Fapel Restaurant; ata mirasının sıcaklığı, baba yadigarı mesleğimizin ustalığıyla birleşerek lezzet yolculuğumuzu şekillendiriyor. Kasaplık geleneğimizi, unutulmaz tatlarla siz değerli misafirlerimize sunmanın gururunu yaşıyoruz. Urfa kültürünün bin yıllık tarihinden süzülen zengin yemek çeşitleri, sadece damaklarda değil, gönüllerde de iz bırakıyor. Urfalıların zanaatkar ellerinden çıkan yemekler, lezizliğinin yanı sıra yüksek besin değerleriyle de ön plana çıkar. Anadolu topraklarından gelen bu eşsiz mutfak, misafirperverliğin ve paylaşmanın en güzel örneklerini sofralarımızda buluşturuyor. Misafirperverliğin sembolü olan Hz. İbrahim (A.S)'in öğretisiyle yetiştik. Urfalıların bu özgün misafirlik anlayışı, tarihi Halil İbrahim Sofralarına kadar uzanır. Bu değerli geleneği, Fapel Restaurant'ta yaşatmanın, her bir misafirimizle paylaşmanın kıvancını taşıyoruz. Ailemizin sıcaklığını, tarih boyunca süregelen lezzetlerimizi ve Anadolu'nun zengin mutfağını bir araya getiren Fapel Restaurant'ta, yöresel sunumlar ve bereket dolu sofralarla sizleri ağırlamaktan mutluluk duyuyoruz. Bizi tercih eden her misafir, bu tarihi lezzet yolculuğunun bir parçası oluyor.",
            'short_content_tr' => 'Ata mirası, baba yadigarı mesleğimiz olan kasaplığı, doyumsuz lezzetlerle sizlere sunuyoruz. Urfalıların asırlık damak zevkini yansıtan yemekler, yüksek besin değerlerine sahiptir. Anadolu’da yemek paylaşma geleneği özeldir.',

            'content_en' => "Fapel Restaurant embodies the warmth of our ancestral heritage combined with the expertise of our cherished profession. We take pride in presenting our butchery tradition with unforgettable flavors to our esteemed guests. The diverse culinary delights, steeped in Urfa’s millennium-old history, not only tantalize the palate but also touch the soul. Dishes crafted by the skillful hands of the people of Urfa, stand out not only for their delightful taste but also their high nutritional value. This unique cuisine from Anatolian lands epitomizes the spirit of hospitality and sharing, both of which are celebrated at our tables. We have been nurtured by the teachings of Prophet Ibrahim (A.S), the symbol of hospitality. The distinct understanding of hospitality by the people of Urfa is said to trace back to the historical feasts of Halil Ibrahim. We cherish the honor of preserving this precious tradition at Fapel Restaurant, sharing it with every guest. At Fapel Restaurant, where we merge our family's warmth with flavors that have persisted throughout history and the richness of Anatolian cuisine, we delight in welcoming you with local presentations and bountiful tables. Each guest who chooses us becomes a part of this historical gastronomic journey.",
            'short_content_en' => 'Rooted in ancestral heritage, the Fapel family presents incomparable flavors through butchery. Urfa s centuries-old palates boast dishes with high nutritional value. Sharing meals is a hallmark of Anatolian culture.',

            'content_ar' => "Fapel مطعم يجسد دفء تراثنا الأنسابي مع خبرتنا في مهنتنا المحترمة. نفتخر بتقديم تقاليد الجزارة لضيوفنا الكرام بنكهات لا تُنسى. تتميز الأطعمة المتنوعة، التي تنقل تاريخ مدينة أورفا الذي يمتد لألف سنة، ليس فقط بتلذذها ولكن أيضًا بلمس الروح. تبرز الأطعمة التي تم تحضيرها بأيدي أهل أورفا الماهرة ليس فقط بطعمها الرائع ولكن أيضًا بقيمتها الغذائية العالية. تجسد هذه المأكولات الفريدة من أراضي الأناضول روح الضيافة والمشاركة، وكلاهما يحتفل به في مائدتنا. تربينا على تعاليم النبي إبراهيم (عليه السلام)، رمز الضيافة. يقال أن فهم الضيافة المميزة لأهل أورفا يعود إلى ولائم حليل إبراهيم التاريخية. نحن نقدر الشرف في الحفاظ على هذا التقليد الثمين في مطعم Fapel، مشاركته مع كل ضيف. في مطع",



    'short_content_ar' => 'موروث الأجداد وميراث الآباء في مهنتنا، نقدم في فابل نكهات فريدة. أطباق أورفا تحمل قيمة غذائية عالية. تقليد المشاركة في الطعام يُعتبر فناً في ثقافة الأناضول.'
]);


    }
}

