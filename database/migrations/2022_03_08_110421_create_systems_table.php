<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('seriale', 50)->unique();
            $table->string('n_telefono', 20)->unique();
            $table->string('citta_installazione', 50);
            $table->string('via', 100);
            $table->integer('seriale_via');
            $table->float('latitudine', 10, 8);
            $table->float('longitudine', 11, 8);

            //chiavi esterne
            $table->foreignId('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreignId('lamp_id')->references('id')->on('lamps')->onDelete('cascade');
            $table->foreignId('battery_id')->references('id')->on('batteries')->onDelete('cascade');

            $table->dateTime('data_installazione');
            $table->enum('hardware_regolatore', ['0', 'SPB-20-GSM', 'SPB-LS-GSM', 'SPB-LS-GSM-PB-LI']);
            $table->char('utc', 3);
            $table->string('impostazioni', 300);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
