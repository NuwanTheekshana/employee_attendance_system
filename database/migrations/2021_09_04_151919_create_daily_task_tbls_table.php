<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTaskTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_task_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('task_discription');
            $table->datetime('task_add_time');
            $table->datetime('task_complete_time');
            $table->string('status');
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
        Schema::dropIfExists('daily_task_tbls');
    }
}
