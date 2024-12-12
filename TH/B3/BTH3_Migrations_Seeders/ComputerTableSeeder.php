<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $brands = ['Dell', 'HP', 'Lenovo', 'Apple', 'Asus', 'Acer', 'MSI', 'Razer'];
        $laptopModels = ['XPS', 'Spectre', 'ThinkPad', 'MacBook', 'ZenBook', 'Predator', 'GS', 'Blade'];
        $desktopModels = ['OptiPlex', 'Pavilion', 'ThinkCentre', 'iMac', 'ROG', 'Helios', 'GE', 'Blade'];
        $operatingSystems = ['Windows 10', 'Windows 11', 'macOS', 'Linux', 'Ubuntu', 'Fedora'];
        $memories = [4, 8, 16, 32];

        for ($i = 0; $i < 30; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->randomElement($brands),
                'model' => $faker->randomElement($laptopModels),
                'operating_system' => $faker->randomElement($desktopModels),
                'processor' => $faker->randomElement($operatingSystems),
                'memory' => $faker->randomElement($memories),
                'available' => $faker->boolean(),
            ]);
        }
    }
}
