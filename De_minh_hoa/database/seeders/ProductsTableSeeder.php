<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $storesID = DB::table('stores')->pluck('id')->toArray();

        foreach(range(1, 50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->unique()->name(),
                'description' => $faker->sentence(),
                'price' => $faker->numberBetween(100, 1000),
                'store_id' => $faker->randomElement($storesID),
                'created_at' => $faker->date(),
                'updated_at' => $faker->date()
            ]);
        }
    }
}
