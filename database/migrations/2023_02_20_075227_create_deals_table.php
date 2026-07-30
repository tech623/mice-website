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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->unsignedBigInteger('enquiry_id');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->enum('source', ['website', 'manual'])->nullable();
            $table->integer('event_id')->nullable();
            $table->string('location', 32)->nullable();
            $table->string('venue', 50)->nullable();
            $table->string('event_date_range')->nullable();
            $table->integer('number_of_guests')->nullable();
            $table->enum('status', ['open', 'picked', 'closed-lost', 'closed-won', 'invalid'])->default('open');
            $table->longtext('comments')->nullable();
            $table->integer('assigned_to_user')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('deals');
    }
};
