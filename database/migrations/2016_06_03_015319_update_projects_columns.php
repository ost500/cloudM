<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('projects', function ($table) {
            $table->dropColumn('address_gungu');
            $table->dropColumn('plan_status');
            $table->dropColumn('area');
            $table->dropColumn('phone_num');
            $table->dropColumn('estimated_duration');
        });

        Schema::table('projects', function ($table) {
            $table->date('deadline');
            $table->enum('reason', array('견적문의', '시장조사', '실제진행'));

            $table->enum('purpose', array('단기 매출증대', '웹사이트 유입증가', '상담 DB확보', '이벤트 참여', '상품인지', '장기 브랜딩', '기타'));

            $table->enum('area', ['광고 의뢰', '운영 대행', 'Viral', '1회성 프로젝트', '기타'])->after('id');


            $table->string('estimated_duration', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('projects', function ($table) {
            $table->dropColumn('deadline');
            $table->dropColumn('reason');
            $table->dropColumn('purpose');

        });

        Schema::table('projects', function ($table) {
            $table->string('address_gungu', 45);
            $table->enum('plan_status', array('아이디어 단계', '필요기능 정리', '기획 작성 중', '상세 기획서 보유'));
            $table->string('phone_num', 11);
        });
    }
}
