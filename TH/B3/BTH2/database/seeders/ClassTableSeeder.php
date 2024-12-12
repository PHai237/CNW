<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Mầm Non', 'Tiểu Học', 'Trung Học Cơ Sở', 'Trung Học Phổ Thông', 'Đại Học']),
                'room_number' => $faker->randomElement(['VH1', 'VH2', 'VH3', 'VH4', 'VH5', 'VH6', 'VH7', 'VH8', 'VH9', 'VH10'])
            ]);
        }
    }
}
