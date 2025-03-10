<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name' => 'Electronics', 'description' => 'Electronic gadgets and accessories'],
            ['name' => 'Clothing', 'description' => 'Men and Women Clothing'],
            ['name' => 'Books', 'description' => 'Educational and Fictional Books'],
        ]);
    }
}
