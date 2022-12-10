<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++):
            $item = Item::create([
                'name' => 'freeitem' . $i,
                'category_id' => ($i+1),
                'image' => 'image url',
                'price' => 0
            ]);
        endfor;
        for($i = 0; $i < 10; $i++):
            $item = Item::create([
                'name' => 'item' . $i,
                'category_id' => ($i+1),
                'image' => 'image url',
                'price' => 3000
            ]);
        endfor;
    }
}
