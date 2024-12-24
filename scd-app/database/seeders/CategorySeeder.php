<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Food']);
        Category::create(['name' => 'Skincare']);
        Category::create(['name' => 'Home']);
        Category::create(['name' => 'Baby']);
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Personal']);
    }
}
