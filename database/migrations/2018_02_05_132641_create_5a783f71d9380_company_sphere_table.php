<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a783f71d9380CompanySphereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('company_sphere')) {
            Schema::create('company_sphere', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id', 'fk_p_114792_101207_sphere_5a783f71d9460')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('sphere_id')->unsigned()->nullable();
                $table->foreign('sphere_id', 'fk_p_101207_114792_compan_5a783f71d94dc')->references('id')->on('spheres')->onDelete('cascade');
                
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
        Schema::dropIfExists('company_sphere');
    }
}
