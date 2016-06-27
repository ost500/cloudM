<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectsStepItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropColumn('step');

        });
        Schema::table('projects', function (Blueprint $table) {

            $table->enum('step', array('검수', '게시', '미팅', '계약', '대금지급', '완료', '취소', '등록 실패', '임시 저장'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
