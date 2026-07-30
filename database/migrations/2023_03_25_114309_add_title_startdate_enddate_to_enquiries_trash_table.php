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
            $table->text('title')->nullable()->after('id');
            $table->text('proposed_start_date')->nullable()->after('event_date_range');
            $table->text('proposed_end_date_date')->nullable()->after('proposed_start_date');
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
