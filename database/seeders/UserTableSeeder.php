<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Player;
use App\Models\Admin;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123123123'),
            'role' => 'admin'
        ]);
        $player = User::create([
            'name' => 'player',
            'email' => 'player@test.com',
            'password' => bcrypt('player'),
            'role' => 'player'
        ]);
    }
}
