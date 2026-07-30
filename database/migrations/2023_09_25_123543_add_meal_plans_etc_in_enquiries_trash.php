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
        Schema::table('enquiries_trash', function (Blueprint $table) {
            $table->integer('number_of_room_nights')->nullable()->after('number_of_rooms');
            $table->string('client_designation',50)->nullable()->after('number_of_room_nights');
            $table->enum('meal_plan', ['cp', 'map', 'ap'])->nullable()->after('client_designation');
            $table->enum('meal_package', ['lunch-and-hi-tea', 'breakfast-lunch-and-hi-tea', 'breakfast-lunch-hi-tea-and-dinner'])->nullable()->after('meal_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enquiries_trash', function (Blueprint $table) {
            //
        });
    }
};
