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
        Schema::table('room_occupancy_details', function (Blueprint $table) {
            $table->string('room_gst',45)->default(0)->after('room_charges');
            $table->string('room_gst_charges',45)->default(0)->after('room_gst');
            $table->integer('room_total_charges')->nullable()->after('room_gst_charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_occupancy_details', function (Blueprint $table) {
            //
        });
    }
};
