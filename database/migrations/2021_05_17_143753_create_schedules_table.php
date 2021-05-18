<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('time_table_id')->nullable();
            $table->string('day')->nullable();
            $table->string('teacher_first')->nullable();
            $table->string('room_first')->nullable();
            $table->string('teacher_second')->nullable();
            $table->string('room_second')->nullable();
            $table->string('teacher_third')->nullable();
            $table->string('room_third')->nullable();
            $table->string('teacher_fourth')->nullable();
            $table->string('room_fourth')->nullable();
            $table->string('teacher_fifth')->nullable();
            $table->string('room_fifth')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
