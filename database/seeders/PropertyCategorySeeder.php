<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_categories')->insert([
            'name' => 'Fruits',
            'image'=> '/images/tests/categories/fruits.jpg'
        ]);
        DB::table('property_categories')->insert([
            'name' => 'Liquor',
            'image'=> '/images/tests/categories/liquor.jpg'
        ]);
        DB::table('property_categories')->insert([
            'name' => 'Electronics',
            'image'=> '/images/tests/categories/electronics.jpg'
        ]);
        DB::table('property_categories')->insert([
            'name' => 'Essentials',
            'image'=> '/images/tests/categories/essentials.jpg'
        ]);
        DB::table('property_categories')->insert([
            'name' => 'Luxury',
            'image'=> '/images/tests/categories/luxury.jpg'
        ]);
    }
}
