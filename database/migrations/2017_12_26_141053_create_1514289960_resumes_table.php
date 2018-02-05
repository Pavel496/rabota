<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1514289960ResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('resumes')) {
            Schema::create('resumes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('text');
                $table->string('wage');
                $table->string('company_address');
                $table->string('avatar');
                $table->string('phone_temp');
                $table->date('to_delete_at')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('resumes');
    }
}
