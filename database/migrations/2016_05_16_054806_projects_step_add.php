<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectsStepAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function($table){
            $table->enum('step', array('검수', '게시','미팅','계약','대금지급','완료','취소'));
            $table->integer('Client_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function($table)
        {
            $table->dropColumn('step');
            $table->dropColumn('Client_id');
        });
    }
}
