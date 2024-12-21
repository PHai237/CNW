<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerID = DB::table('computers')->pluck('id')->toArray();

        foreach(range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerID),
                'reported_by' => $faker->name(),
                'reported_date' => $faker->date(),
                'description' => $faker->sentence(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
