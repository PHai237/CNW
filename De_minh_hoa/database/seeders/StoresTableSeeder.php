<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index) {
            DB::table('stores')->insert([
                'name' => $faker->unique()->name(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'created_at' => $faker->date(),
                'updated_at' => $faker->date()
            ]);
        }
    }
}
