<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Battery;

class BatteriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //creo 10 tipi di batterie random
        for($i = 0; $i < 10; $i++){
            $newBattery = new Battery;
            $newBattery->modello = $faker->word;
            $newBattery->descrizione = $faker->sentence(3, true);
            $newBattery->capacita = $faker->numberBetween(40, 200);
            $newBattery->potenza = $faker->numberBetween(30, 120);
            $newBattery->tensione = $faker->randomFloat(1, 12, 24);
            $newBattery->quantita = $faker->numberBetween(1, 2);
            $newBattery->scheda_tecnica = $faker->imageUrl(640, 480);

            $newBattery->save();
        }
    }
}
