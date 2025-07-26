<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Danh sách các thương hiệu quần áo.
     */
    private const BRANDS = [
        'Nike',
        'Adidas',
        'Zara',
        'H&M',
        'Uniqlo',
        'Gucci',
        'Levi\'s',
        'Lacoste',
        'Puma',
        'Balenciaga',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::BRANDS as $brandName) {
            Brand::create([
                'name_brand' => $brandName,
            ]);
        }
    }
}
