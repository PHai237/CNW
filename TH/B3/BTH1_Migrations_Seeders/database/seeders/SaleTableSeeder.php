<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $medicineID = DB::table('medicines')->pluck('medicine_id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            DB::table('sales')->insert([
                'drug_id' => $faker->randomElement($medicineID),
                'quantity' => $faker->numberBetween(10, 100),
                'sale_date' => $faker->dateTime(),
                'customer_phone' => $faker->phoneNumber(),
            ]);
        }
    }
}
