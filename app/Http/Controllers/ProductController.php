<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Data produk dummy (sementara hardcode)
        $products = [
            [
                'title' => 'Gorden 1',
                'subtitle' => 'Dark Gray',
                'price' => 2500000,
                'old_price' => 3500000,
                'tag' => '-30%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 1.jpg'),
            ],
            [
                'title' => 'Gorden 2',
                'subtitle' => 'White',
                'price' => 2500000,
                'old_price' => null,
                'tag' => '-30%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 2.jpg'),
            ],
            [
                'title' => 'Gorden 3',
                'subtitle' => 'Light Cream',
                'price' => 7000000,
                'old_price' => 14000000,
                'tag' => '-50%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 3.jpg'),
            ],
            [
                'title' => 'Gorden 4',
                'subtitle' => 'Roller Blind',
                'price' => 500000,
                'old_price' => null,
                'tag' => 'New',
                'tag_color' => 'bg-teal-400',
                'image' => asset('img/Gorden 4.jpg'),
            ],
            [
                'title' => 'Gorden 5',
                'subtitle' => 'Super Dark Grey',
                'price' => 1500000,
                'old_price' => null,
                'tag' => null,
                'tag_color' => null,
                'image' => asset('img/Gorden 5.jpg'),
            ],
            [
                'title' => 'Gorden 6',
                'subtitle' => 'Vertical blind',
                'price' => 150000,
                'old_price' => null,
                'tag' => 'New',
                'tag_color' => 'bg-teal-400',
                'image' => asset('img/Gorden 6.jpg'),
            ],
            [
                'title' => 'Gorden 7',
                'subtitle' => 'Blue',
                'price' => 7000000,
                'old_price' => 14000000,
                'tag' => '-50%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 7.jpg'),
            ],
            [
                'title' => 'Gorden 8',
                'subtitle' => 'Red',
                'price' => 500000,
                'old_price' => null,
                'tag' => 'New',
                'tag_color' => 'bg-teal-400',
                'image' => asset('img/Gorden 8.jpg'),
            ],
        ];

        return view('Produk.produk-gorden', compact('products'));
    }
}
