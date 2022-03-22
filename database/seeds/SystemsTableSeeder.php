<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\System;
use App\Battery;
use App\Module;
use App\Lamp;

class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //creo 10 tipi di sistemi random
        for($i = 0; $i < 10; $i++){
            //associo il sistema a moduli random, lampade random, batterie random
            $randomModule = Module::inRandomOrder()->first();
            $randomLamp = Lamp::inRandomOrder()->first();
            $randomBattery = Battery::inRandomOrder()->first();
            //preparo array di valori enum per harware regolatore
            $array_hardware = ['SPB-20-GSM','SPB-LS-GSM','SPB-LS-GSM-PB-LI'];

            $simbol = (rand(0, 1) == 1) ? '+' : '-';
            $esadec = (rand(0, 1) == 1) ? str_replace('#', '', $faker->hexcolor).'00000000000000000000000000' : str_replace('#', '', $faker->hexcolor).'000000';

            $newSystem = new System;

            $newSystem->seriale = $faker->unique()->numerify('###############');
            $newSystem->n_telefono = $faker->e164PhoneNumber;
            $newSystem->citta_installazione = $faker->city;
            $newSystem->via = $faker->streetName;
            $newSystem->seriale_via = $faker->numberBetween(1, 50);
            $newSystem->latitudine = $faker->latitude;
            $newSystem->longitudine = $faker->longitude;
            $newSystem->module_id = $randomModule->id;
            $newSystem->lamp_id = $randomLamp->id;
            $newSystem->battery_id = $randomBattery->id;
            $newSystem->data_installazione = $faker->date;
            $newSystem->hardware_regolatore = $array_hardware[rand(0, 2)];
            $newSystem->utc = $simbol.$faker->numberBetween(0, 12);
            $newSystem->impostazioni = $esadec;
            $newSystem->note = $faker->paragraph(5, true);

            $newSystem->save();
        }
    }
}
