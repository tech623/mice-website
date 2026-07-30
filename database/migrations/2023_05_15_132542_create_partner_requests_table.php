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
        Schema::create('partner_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title', 10)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('mobile_number', 50)->nullable();
            $table->string('property_name', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->text('additional_information')->nullable();
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
        Schema::dropIfExists('partner_requests');
    }
};
