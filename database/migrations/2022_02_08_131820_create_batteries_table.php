<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->id();
            $table->string('modello', 150);
            $table->text('descrizione');
            $table->smallInteger('capacita');
            $table->smallInteger('potenza');
            $table->float('tensione', 3, 1);
            $table->tinyInteger('quantita');
            $table->text('scheda_tecnica');
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
        Schema::dropIfExists('batteries');
    }
}
