<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        \DB::table('categories')->truncate();
        \DB::table('categories')->insert([
            [
                'name' => 'Head'
            ], [
                'name' => 'Hairs'
            ], [
                'name' => 'Lips'
            ], [
                'name' => 'Neck'
            ], [
                'name' => 'Torso'
            ], [
                'name' => 'Hand'
            ],[
                'name' => 'Vest'
            ], [
                'name' => 'Pants'
            ], [
                'name' => 'Shoes'
            ], [
                'name' => 'Skin'
            ],
        ]);
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
