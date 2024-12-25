<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $courseName = [
            "Introduction to Programming", 
            "Data Structures and Algorithms", 
            "Web Development", 
            "Database Systems", 
            "Machine Learning", 
            "Cybersecurity Fundamentals", 
            "Cloud Computing", 
            "Artificial Intelligence", 
            "Mobile App Development", 
            "Software Engineering"
        ];            

        foreach(range(1, 50) as $index) {
            DB::table('courses')->insert([
                'name' => $faker->randomElement($courseName),
                'description' => $faker->sentence(),
                'difficulty' => $faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
                'price' => $faker->numberBetween(100, 1000),
                'start_date' => $faker->date(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
