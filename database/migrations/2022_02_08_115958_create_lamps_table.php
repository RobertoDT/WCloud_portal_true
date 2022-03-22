<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamps', function (Blueprint $table) {
            $table->id();
            $table->string('modello', 150);
            $table->tinyInteger('potenza');
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
        Schema::dropIfExists('lamps');
    }
}
