<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systemdata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('system_id')->references('id')->on('systems')->onDelete('cascade');
            $table->string('info_GSM')->nullable();
            $table->dateTime('data_time');
            $table->text('dato');
            $table->string('impostazioni_TX', 300)->nullable();
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
        Schema::dropIfExists('systemdata');
    }
}
