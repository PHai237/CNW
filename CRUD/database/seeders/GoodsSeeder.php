<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Company;
use App\Models\Goods;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $companyID = Company::pluck('id');

        for ($i = 0; $i < 20; $i++) {
            Goods::create([
                'company_id' => $companyID->random(),
                'good_name' => $faker->randomElement(['Điện thoại thông minh', 'TV', 'Máy tính bảng', 'Máy ảnh', 'Tai nghe', 'Thiết bị gia dụng', 'Loa', 'Máy tính xách tay', 'Phụ kiện máy tính', 'Máy in']),
                'quality' => $faker->randomElement(['Low', 'Medium', 'High']),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 100, 2000),
                'quantity' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}
