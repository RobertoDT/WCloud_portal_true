<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('cognome', 50);
            $table->string('ragione_sociale');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('indirizzo', 100);
            $table->string('citta', 50);
            $table->string('telefono', 20);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_customer')->default(0);
            $table->boolean('is_installer')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
