<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'address' => 'Şenlikköy Mah. Eski Halkalı Cad. Ofis Florya No:3/13, 34153 Bakırköy / İstanbul',
            'phone' => '(0212) 599 63 63',
            'email' => 'info@fapel.com.tr',
            'weekday_opening_time' => '09:00-00:00',
            'weekend_opening_time' => '09:00-00:00',
            'facebook_link' => 'https://www.facebook.com/fapelcom',
            'twitter_link' => 'https://twitter.com/fapelcom',
            'instagram_link' => 'https://instagram.com/fapelcom',
            'linkedin_link' => 'https://linkedin.com/in/fapelcom',


            'footer_text_tr' => "Fapel, ata mirası kasaplıkla Urfalıların damak zevkini bereketli sofralarında sunar. Anadolu'nun misafirperverliğini ve Halil İbrahim Sofrası'nın geleneğini her lokmada hissedin.",
            'footer_text_en' => "Fapel, with its ancestral legacy of butchery, presents the palate delight of the people from Urfa on its bountiful tables. Feel the hospitality of Anatolia and the tradition of Halil Ibrahim's Feast in every bite.",
            'footer_text_ar' => "فابل، بفضل تراثها العائلي في فن الجزارة، تقدم مذاق الأكلات التقليدية لأهل أورفا على موائدها الغنية. اشعر بضيافة أناضول وتقاليد وليمة حليل إبراهيم في كل لقمة.",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

