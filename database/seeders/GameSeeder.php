<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Membangun Pecahan',
            'class' => 'Elementary School',
            'image' => 'default.jpg',
        ]);
        Game::create([
            'name' => 'Pola Bilangan',
            'class' => 'Junior Height School',
            'image' => 'default.jpg',
        ]);
        Game::create([
            'name' => 'Dimensi Tiga',
            'class' => 'Senior Height School',
            'image' => 'default.jpg',
        ]);
    }
}
