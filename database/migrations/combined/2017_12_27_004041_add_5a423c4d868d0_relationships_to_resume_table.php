<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a423c4d868d0RelationshipsToResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function(Blueprint $table) {
            if (!Schema::hasColumn('resumes', 'experience_id')) {
                $table->integer('experience_id')->unsigned()->nullable();
                $table->foreign('experience_id', '101211_5a423b2cd527c')->references('id')->on('experiences')->onDelete('cascade');
                }
                if (!Schema::hasColumn('resumes', 'lasting_id')) {
                $table->integer('lasting_id')->unsigned()->nullable();
                $table->foreign('lasting_id', '101211_5a423b2cdb38d')->references('id')->on('lastings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('resumes', 'phone_id')) {
                $table->integer('phone_id')->unsigned()->nullable();
                $table->foreign('phone_id', '101211_5a423b2ce0a4f')->references('id')->on('phones')->onDelete('cascade');
                }
                if (!Schema::hasColumn('resumes', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '101211_5a423b2ce5e73')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('resumes', function(Blueprint $table) {
            if(Schema::hasColumn('resumes', 'experience_id')) {
                $table->dropForeign('101211_5a423b2cd527c');
                $table->dropIndex('101211_5a423b2cd527c');
                $table->dropColumn('experience_id');
            }
            if(Schema::hasColumn('resumes', 'lasting_id')) {
                $table->dropForeign('101211_5a423b2cdb38d');
                $table->dropIndex('101211_5a423b2cdb38d');
                $table->dropColumn('lasting_id');
            }
            if(Schema::hasColumn('resumes', 'phone_id')) {
                $table->dropForeign('101211_5a423b2ce0a4f');
                $table->dropIndex('101211_5a423b2ce0a4f');
                $table->dropColumn('phone_id');
            }
            if(Schema::hasColumn('resumes', 'created_by_id')) {
                $table->dropForeign('101211_5a423b2ce5e73');
                $table->dropIndex('101211_5a423b2ce5e73');
                $table->dropColumn('created_by_id');
            }
            
        });
    }
}
