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
        $productName = [
            'Logitech MX Master 3',
            'Apple Magic Keyboard',
            'Razer Kraken Headset',
            'Dell UltraSharp Monitor',
            'Microsoft Surface Mouse',
            'Corsair K95 RGB Platinum',
            'SteelSeries Arctis 7',
            'LG UltraWide Monitor',
            'Asus ROG Gladius II',
            'HyperX Alloy FPS Pro'
        ];

        $categoryName = [
            'Mouse',
            'Keyboard',
            'Headset',
            'Monitor',
        ];

        foreach(range(1, 50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->randomElement($productName),
                'category' => $faker->randomElement($categoryName),
                'description' => $faker->sentence(),
                'price' => $faker->numberBetween(100, 1000),
                'stock' => $faker->numberBetween(10,200),
                'supplier_email' => $faker->companyEmail(),
                'created_at' => $faker->date(),
                'updated_at' => $faker->date(),
            ]);
        }
    }
}
