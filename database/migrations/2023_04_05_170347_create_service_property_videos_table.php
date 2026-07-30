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
        Schema::create('service_property_videos', function (Blueprint $table) {
            $table->id();
            $table->text('video_url')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->nullable()->references('id')->on('services');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->nullable()->references('id')->on('properties');
            $table->string('status', 10)->nullable();
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
        Schema::dropIfExists('service_property_videos');
    }
};
