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
        Schema::create('enquiries_trash', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('email', 64)->nullable();
            $table->enum('source', ['website', 'manual'])->nullable();
            $table->integer('event_id')->nullable();
            $table->string('location', 32)->nullable();
            $table->string('venue', 50)->nullable();
            $table->string('event_date_range')->nullable();
            $table->integer('number_of_guests')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->enum('status', ['open', 'picked', 'closed-lost', 'closed-won', 'invalid'])->default('open');
            $table->longtext('comments')->nullable();
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
        Schema::dropIfExists('enquiries_trash');
    }
};
