<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments',function ($table){
            $table->integer('u_id')->unsigned()->index();
            $table->foreign('u_id')
                ->references('id')->on('users');
            $table->boolean('secret')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function ($table){
            $table->dropcolumn('u_id');
            $table->dropcolumn('secret');
        });
    }
}
