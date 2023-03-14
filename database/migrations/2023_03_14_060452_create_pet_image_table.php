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
        Schema::create('pet_image', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('user_pet_id')->length(20)->unsigned();
            $table->foreign('user_pet_id')->references('id')->on('user_pet');
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
        Schema::dropIfExists('pet_image');
    }
};
