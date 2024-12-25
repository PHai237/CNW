<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Users1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index) {
            DB::table('users1')->insert([
                'username' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(),
                'role' => $faker->randomElement(['Admin', 'User', 'Moderator']),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
