<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a423c4dec7adResumeScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('resume_schedule')) {
            Schema::create('resume_schedule', function (Blueprint $table) {
                $table->integer('resume_id')->unsigned()->nullable();
                $table->foreign('resume_id', 'fk_p_101211_101208_schedu_5a423c4dec87a')->references('id')->on('resumes')->onDelete('cascade');
                $table->integer('schedule_id')->unsigned()->nullable();
                $table->foreign('schedule_id', 'fk_p_101208_101211_resume_5a423c4dec8fd')->references('id')->on('schedules')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_schedule');
    }
}
