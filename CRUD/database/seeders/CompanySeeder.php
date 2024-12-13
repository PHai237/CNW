<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Company::create([
                'brand' => $faker->randomElement(['Apple Inc.', 'Sony Corporation', 'Samsung Electronics Co.', 'LG Electronics Inc.', 'Panasonic Corporation', 'Microsoft Corporation', 'Intel Corporation', 'HP Inc.', 'Dell Technologies Inc.', 'Acer Inc.']),
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'email' => $faker->email()
            ]);
        }
    }
}
