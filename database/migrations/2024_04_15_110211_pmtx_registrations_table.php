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
        Schema::create('pmtx_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('guest_name', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('mobile_number', 12)->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamp('check_in_date')->nullable();
            $table->timestamp('check_out_date')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->string('category', 45)->nullable();
            $table->string('bed_type', 45)->nullable();
            $table->string('bed_price', 45)->nullable();
            $table->string('total_price', 45)->nullable();
            $table->string('meal_plan', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pmtx_registrations');
    }
};
