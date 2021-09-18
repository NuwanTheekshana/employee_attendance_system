<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->date('leave_date');
            $table->string('leave_type');
            $table->string('leave_reason');
            $table->string('status');
            $table->datetime('date_time');
            $table->boolean('remove_status')->default(0);
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
        Schema::dropIfExists('leave_tbls');
    }
}
