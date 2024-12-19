<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerNames = ['Dell', 'HP', 'Lenovo', 'Apple', 'Asus', 'Acer', 'Microsoft', 'Razer', 'MSI', 'Samsung'];

        foreach(range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->randomElement($computerNames),
                'model' => $faker->randomElement(['XPS 13', 'Spectre x360', 'ThinkPad X1 Carbon', 'MacBook Pro', 'ROG Zephyrus G14', 'Swift 3', 'Surface Laptop 5', 'Blade 15', 'Prestige 14', 'Galaxy Book3 Pro']),
                'operating_system' => $faker->randomElement(['Windows 11', 'Windows 10', 'macOS Ventura', 'macOS Monterey', 'Ubuntu 22.04', 'Fedora 38', 'Debian 12', 'Linux Mint', 'Chrome OS', 'Kali Linux']),
                'processor' => $faker->randomElement(['Intel Core i9-13900K', 'Intel Core i7-13700H', 'Intel Core i5-13600K', 'AMD Ryzen 9 7950X', 'AMD Ryzen 7 7800X3D', 'AMD Ryzen 5 7600X', 'Apple M2 Pro', 'Apple M1 Max', 'Intel Xeon W-2400', 'Qualcomm Snapdragon 8cx Gen 3']),
                'memory' => $faker->randomElement(['4', '8', '16', '32', '64']),
                'available' => $faker->boolean(),
            ]);
        }
    }
}
