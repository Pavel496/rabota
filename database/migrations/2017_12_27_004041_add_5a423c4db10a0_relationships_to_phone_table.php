<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a423c4db10a0RelationshipsToPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phones', function(Blueprint $table) {
            if (!Schema::hasColumn('phones', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '101212_5a423b21b21d7')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('phones', function(Blueprint $table) {
            if(Schema::hasColumn('phones', 'created_by_id')) {
                $table->dropForeign('101212_5a423b21b21d7');
                $table->dropIndex('101212_5a423b21b21d7');
                $table->dropColumn('created_by_id');
            }
            
        });
    }
}
