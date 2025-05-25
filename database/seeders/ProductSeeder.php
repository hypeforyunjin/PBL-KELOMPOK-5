<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Gorde A',
                'description' => 'Gorde A adalah tirai elegan...',
                'price' => 1000000,
                'image_path' => 'images/gorde-a.jpg',
            ],
            [
                'name' => 'Gorde B',
                'description' => 'Gorde B adalah tirai elegan...',
                'price' => 1500000,
                'image_path' => 'images/gorde-b.jpg',
            ],
            [
                'name' => 'Gorde C',
                'description' => 'Gorde C adalah tirai elegan...',
                'price' => 2000000,
                'image_path' => 'images/gorde-c.jpg',
            ]
        ];
        foreach ($data as $da) {
            Product::create($da);
        }
    }
}
