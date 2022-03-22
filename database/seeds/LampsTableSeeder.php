<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Lamp;

class LampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //creo 10 tipi di lampade random
        for($i = 0; $i < 10; $i++){
            $newLamp = new Lamp;
            $newLamp->modello = $faker->word;
            $newLamp->descrizione = $faker->sentence(3, true);
            $newLamp->potenza = $faker->numberBetween(150, 300);
            $newLamp->quantita = $faker->numberBetween(1, 2);
            $newLamp->scheda_tecnica = $faker->imageUrl(640, 480);

            $newLamp->save();
        }
    }
}
