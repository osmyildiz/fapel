<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 50) as $index) {
            DB::table('reservations')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'reservation_date' => $faker->date,
                'reservation_time' => $faker->time,
                'guest_count' => $faker->numberBetween(1, 10),
                'branch' => $faker->word,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
