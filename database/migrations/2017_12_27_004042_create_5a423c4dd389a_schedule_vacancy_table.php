<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a423c4dd389aScheduleVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('schedule_vacancy')) {
            Schema::create('schedule_vacancy', function (Blueprint $table) {
                $table->integer('schedule_id')->unsigned()->nullable();
                $table->foreign('schedule_id', 'fk_p_101208_101206_vacanc_5a423c4dd396a')->references('id')->on('schedules')->onDelete('cascade');
                $table->integer('vacancy_id')->unsigned()->nullable();
                $table->foreign('vacancy_id', 'fk_p_101206_101208_schedu_5a423c4dd39e8')->references('id')->on('vacancies')->onDelete('cascade');
                
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
        Schema::dropIfExists('schedule_vacancy');
    }
}
