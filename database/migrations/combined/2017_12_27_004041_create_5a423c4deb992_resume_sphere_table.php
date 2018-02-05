<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a423c4deb992ResumeSphereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('resume_sphere')) {
            Schema::create('resume_sphere', function (Blueprint $table) {
                $table->integer('resume_id')->unsigned()->nullable();
                $table->foreign('resume_id', 'fk_p_101211_101207_sphere_5a423c4debaa7')->references('id')->on('resumes')->onDelete('cascade');
                $table->integer('sphere_id')->unsigned()->nullable();
                $table->foreign('sphere_id', 'fk_p_101207_101211_resume_5a423c4debb3c')->references('id')->on('spheres')->onDelete('cascade');
                
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
        Schema::dropIfExists('resume_sphere');
    }
}
