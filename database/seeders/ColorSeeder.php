<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Cyan'],
            ['name' => 'Magenta'],
            ['name' => 'Teal'],
            ['name' => 'Maroon'],
            ['name' => 'Navy'],
            ['name' => 'Olive'],
            ['name' => 'Lime'],
            ['name' => 'Brown'],
            ['name' => 'Beige'],
            ['name' => 'Turquoise'],
        ];

        foreach ($colors as $color) {
            \App\Models\Color::create($color);
        }
    }
}
