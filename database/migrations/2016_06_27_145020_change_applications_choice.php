<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeApplicationsChoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {

            $table->dropColumn('step');

        });
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('choice');
        });
        Schema::table('applications', function (Blueprint $table) {
            $table->enum('choice', array('관리자 검수중', '광고주 검수중', '미팅'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            //1
            $table->enum('step', array('승인', '대기', '취소'))->default('대기');

        });
    }
}
