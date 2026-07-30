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
        Schema::table('enquiries', function (Blueprint $table) {
            $table->timestamp('check_in_date')->nullable()->after('event_date_range');
            $table->timestamp('check_out_date')->nullable()->after('check_in_date');
            $table->integer('number_of_rooms')->nullable()->after('check_out_date');
            $table->timestamp('event_date')->nullable()->after('number_of_rooms');
            $table->integer('number_of_pax')->nullable()->after('event_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            //
        });
    }
};
