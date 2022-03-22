<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //creo 10 tipi di moduli random
        for($i = 0; $i < 10; $i++){
            $newModule = new Module;
            $newModule->modello = $faker->word;
            $newModule->descrizione = $faker->sentence(3, true);
            $newModule->potenza = $faker->numberBetween(100, 450);
            $newModule->quantita = $faker->numberBetween(1, 2);
            $newModule->scheda_tecnica = $faker->imageUrl(640, 480);

            $newModule->save();
        }
    }
}
