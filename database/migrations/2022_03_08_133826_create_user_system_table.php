<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_system', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('system_id')->references('id')->on('systems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_system');
    }
}
