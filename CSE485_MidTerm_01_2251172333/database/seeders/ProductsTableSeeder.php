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
        $productNames = [
            'Laptop',
            'Smartphone',
            'Smartwatch',
            'Wireless Earbuds',
            'Gaming Mouse',
            'Mechanical Keyboard',
            'External Hard Drive',
            'Bluetooth Speaker',
            'Monitor 4K',
            'Power Bank',
        ];

        foreach(range(1, 10) as $index) {
            DB::table('products')->insert([
                'product_name' => $faker->randomElement($productNames),
                'description' => $faker->sentence(),
                'price' => $faker->numberBetween(10, 2000),
                'image' => 'images/' . $faker->image('public/images', 640, 480, 'electronics', false),
                'category_name' => $faker->randomElement(['Electronics', 'Accessories', 'Gaming', 'Home Appliances']),
            ]);
        }
    }
}