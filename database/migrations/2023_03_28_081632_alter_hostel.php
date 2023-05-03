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
        Schema::table('hostel_information', function ($table) {
            $table->enum('status', ['Published', 'Not Published', 'Awaiting'])->default('Awaiting');
            $table->boolean('is_home_page')->default(0);
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
        Schema::table('hostel_information', function ($table) {
            $table->dropColumn('status');
            $table->dropColumn('is_home_page');
        });
    }
};
