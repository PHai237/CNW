<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

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

        // Tạo 10 ảnh ngẫu nhiên từ Faker và lưu vào thư mục storage/app/public/images
        $images = [];
        for ($i = 0; $i < 10; $i++) {
            // Tạo tên ảnh ngẫu nhiên
            $imageName = 'product_image_' . uniqid() . '.jpg';
            // Đường dẫn lưu ảnh vào thư mục public/images
            $imagePath = public_path('images/product_image_' . uniqid() . '.jpg');
            $faker->image($imagePath, 640, 480, 'electronics', false);

            // Thêm đường dẫn ảnh vào mảng
            $images[] = 'images/' . $imageName;
        }

        // Thêm các bản ghi vào database
        foreach (range(1, 100) as $index) {
            DB::table('products')->insert([
                'product_name' => $faker->randomElement($productNames),
                'description' => $faker->sentence(),
                'price' => $faker->numberBetween(10, 2000),
                'image' => $faker->randomElement($images),
                'category_name' => $faker->randomElement(['Electronics', 'Accessories', 'Gaming', 'Home Appliances']),
            ]);
        }
    }
}
