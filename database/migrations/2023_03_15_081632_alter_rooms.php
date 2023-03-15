<?php

use Illuminate\Database\Migrations\Migration;
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
        //
        Schema::table('room', function ($table) {
            $table->bigInteger('hostel_id')->unsigned();
            $table->foreign('hostel_id')->references('id')->on('hostel_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('room', function ($table) {
            $table->dropColumn('hostel_id');
        });
    }
};
