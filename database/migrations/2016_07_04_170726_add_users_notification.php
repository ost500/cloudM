<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->enum('project_email',array('전체','중요'));
            $table->enum('contract_email',array('전체','중요'));
            $table->boolean('fastm_email');
            $table->boolean('marketing_email');
            $table->boolean('news_email');
            $table->enum('project_sms',array('전체','중요'));
            $table->enum('contract_sms',array('전체','중요'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('project_email');
            $table->dropColumn('contract_email');
            $table->dropColumn('fastm_email');
            $table->dropColumn('marketing_email');
            $table->dropColumn('news_email');
            $table->dropColumn('project_sms');
            $table->dropColumn('contract_sms');
        });
    }
}
