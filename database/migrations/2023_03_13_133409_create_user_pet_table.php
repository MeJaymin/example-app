<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->length(20)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('pet_type_id')->length(20)->unsigned();
            $table->foreign('pet_type_id')->references('id')->on('pet_type');
            $table->bigInteger('breed_id')->length(20)->unsigned();
            $table->foreign('breed_id')->references('id')->on('pet_breed');
            $table->string('name');
            $table->integer('age');
            $table->boolean('status');
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
        Schema::dropIfExists('user_pet');
    }
};
