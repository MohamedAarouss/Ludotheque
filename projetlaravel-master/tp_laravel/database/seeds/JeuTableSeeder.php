<?php


use Illuminate\Database\Seeder;

class JeuTableSeeder extends Seeder{
    public function run()
    {
        factory(App\Models\Jeu::class, 2)->create();
    }
}