<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'name' => 'FLORYA',
                'address' => 'Şenlikköy Mah. Eski Halkalı Cad. Ofis Florya No:3/13, 34153 Bakırköy / İstanbul',
                'phone' => '0 (212) 553 63 63',
                'weekday_opening_time' => '09:00 – 00:00',
                'weekend_opening_time' => '09:00 – 00:00',
                'is_active' => 1,
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'ATAKÖY',
                'address' => 'Ataköy 2-5-6. kısım Mah. Rauf Orbay Cad.Yalı Ataköy C Blok No:4/7 Bakırköy / İstanbul',
                'phone' => '0 (212) 553 63 63',
                'weekday_opening_time' => '09:00 – 00:00',
                'weekend_opening_time' => '09:00 – 00:00',
                'is_active' => 1,
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'CEVİZLİBAĞ',
                'address' => 'Maltepe Mah. Yedikule Çırpıcı Yol Sk. Avrupa Konutları Ofis No:2A/4 Zeytinburnu/ İstanbul',
                'phone' => '0 (212) 553 63 63',
                'weekday_opening_time' => '09:00 – 00:00',
                'weekend_opening_time' => '09:00 – 00:00',
                'is_active' => 1,
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ]);
    }
}
