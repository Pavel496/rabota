<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a423c4dd286cSphereVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('sphere_vacancy')) {
            Schema::create('sphere_vacancy', function (Blueprint $table) {
                $table->integer('sphere_id')->unsigned()->nullable();
                $table->foreign('sphere_id', 'fk_p_101207_101206_vacanc_5a423c4dd29e6')->references('id')->on('spheres')->onDelete('cascade');
                $table->integer('vacancy_id')->unsigned()->nullable();
                $table->foreign('vacancy_id', 'fk_p_101206_101207_sphere_5a423c4dd2ac8')->references('id')->on('vacancies')->onDelete('cascade');
                
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
        Schema::dropIfExists('sphere_vacancy');
    }
}
