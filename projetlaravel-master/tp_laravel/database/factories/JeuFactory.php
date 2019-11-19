<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Jeu;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(
    Jeu::class,
    function (Faker $faker) {
        return [
            'nom' => $faker->realText($maxNbChars = 20, $indexSize = 2),
            'sortie' => $faker->year($max = 'now'),
            'categorie' => $faker->realText($maxNbChars = 15, $indexSize = 2),
            'age_min' => $faker->randomElement($array = array(3, 7, 12, 16, 18)),
            'description' => $faker->realText($maxNbChars = 20, $indexSize = 2),
            'min_joueur' => $faker -> randomNumber($nbDigits = 1),
            'max_joueur' => $faker -> randomNumber($nbDigits = 2),
            'min_duree' => $faker -> randomNumber($nbDigits = 1),
            'max_duree' => $faker -> randomNumber($nbDigits = 2),
            'image' => $faker -> imageUrl($width = 640, $height = 400)
        ];
    }
);
