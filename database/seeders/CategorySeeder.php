<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Bed Patient', 'Table', 'Gyncolog', 'Stretcher',
            'Cabinet', 'Trolley', 'Over Bed & Mayo', 'Infust Stand', 'Blow Wascom', 'Scrube Station', 'Sink', 'Sccd', 'Other'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
