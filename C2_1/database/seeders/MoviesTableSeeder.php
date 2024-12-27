<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $movieTitle = [
            'Django Unchained',
            'Inception',
            'The Dark Knight',
            'Parasite',
            'Interstellar',
            'The Shawshank Redemption',
            'Forrest Gump',
            'The Godfather',
            'Pulp Fiction',
            'The Matrix',
        ];

        $location = [
            'Galaxy Cinema',
            'CGV Cinemas',
            'Lotte Cinema',
            'BHD Star Cineplex',
            'Mega GS Cinemas',
            'Cinestar',
            'Platinum Cineplex',
            'Beta Cineplex',
            'Dcine Cinemas',
            'Starlight Cinema',
        ];        

        foreach(range(1, 50) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->randomElement($movieTitle),
                'location' => $faker->randomElement($location),
                'start_datetime' => $faker->dateTime(),
                'end_datetime' => $faker->dateTime(),
                'organizer_email' => $faker->companyEmail(),
                'description' => $faker->sentence(),
            ]);
        }
    }
}
