<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('state')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('district')->nullable(false);
            $table->string('street')->nullable(false);
            $table->string('complement')->nullable(false);
            $table->integer('number')->nullable(false);
            $table->foreignId('user_id')->nullable(false)->constrained('users');
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
        Schema::dropIfExists('addresses');
    }
}
