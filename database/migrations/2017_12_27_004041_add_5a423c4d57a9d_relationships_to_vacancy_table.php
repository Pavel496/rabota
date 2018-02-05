<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a423c4d57a9dRelationshipsToVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function(Blueprint $table) {
            if (!Schema::hasColumn('vacancies', 'experience_id')) {
                $table->integer('experience_id')->unsigned()->nullable();
                $table->foreign('experience_id', '101206_5a423b272a151')->references('id')->on('experiences')->onDelete('cascade');
                }
                if (!Schema::hasColumn('vacancies', 'lasting_id')) {
                $table->integer('lasting_id')->unsigned()->nullable();
                $table->foreign('lasting_id', '101206_5a423b2730cfd')->references('id')->on('lastings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('vacancies', 'phone_id')) {
                $table->integer('phone_id')->unsigned()->nullable();
                $table->foreign('phone_id', '101206_5a423b27381a5')->references('id')->on('phones')->onDelete('cascade');
                }
                if (!Schema::hasColumn('vacancies', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '101206_5a423b273f707')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function(Blueprint $table) {
            if(Schema::hasColumn('vacancies', 'experience_id')) {
                $table->dropForeign('101206_5a423b272a151');
                $table->dropIndex('101206_5a423b272a151');
                $table->dropColumn('experience_id');
            }
            if(Schema::hasColumn('vacancies', 'lasting_id')) {
                $table->dropForeign('101206_5a423b2730cfd');
                $table->dropIndex('101206_5a423b2730cfd');
                $table->dropColumn('lasting_id');
            }
            if(Schema::hasColumn('vacancies', 'phone_id')) {
                $table->dropForeign('101206_5a423b27381a5');
                $table->dropIndex('101206_5a423b27381a5');
                $table->dropColumn('phone_id');
            }
            if(Schema::hasColumn('vacancies', 'created_by_id')) {
                $table->dropForeign('101206_5a423b273f707');
                $table->dropIndex('101206_5a423b273f707');
                $table->dropColumn('created_by_id');
            }
            
        });
    }
}
