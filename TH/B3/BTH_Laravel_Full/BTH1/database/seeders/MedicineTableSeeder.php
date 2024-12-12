<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->randomElement(['Paracetamol', 'Ibuprofen', 'Amoxicillin', 'Cephalexin', 'Omeprazole', 'Pantoprazole']),
                'brand' => $faker->randomElement(['Long Châu', 'Phúc An Khang', 'Nhà thuốc FPT', 'Mediplanet']),
                'dosage' => $faker->numberBetween(10, 100) . ' mg',
                'form' => $faker->randomElement(['Viên nén', 'Viên nang', 'Bột thuốc', 'Dung dịch', 'Hỗn dịch', 'Siro']),
                'price' => $faker->randomFloat(2, 10, 50) * 1000,
                'stock' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}
