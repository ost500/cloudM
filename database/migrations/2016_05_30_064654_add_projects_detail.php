<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function ($table) {
            $table->enum('plan_status', array('아이디어 단계', '필요기능 정리', '기획 작성 중', '상세 기획서 보유'));
            $table->enum('managing_experience', array('있음', '없음'));
            $table->date('expected_start_date');
            $table->enum('meeting_way', array('온라인 미팅', '오프라인 미팅', '온/오프라인 미팅'));
            $table->string('address_sido', 45);
            $table->string('address_gungu', 45);
            $table->text('project_way');
            $table->text('now_status');
            $table->text('detail_content');
            $table->text('reference_caution');
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
            $table->dropColumn('plan_status');
            $table->dropColumn('managing_experience');
            $table->dropColumn('expected_start_date');
            $table->dropColumn('meeting_way');
            $table->dropColumn('address_sido');
            $table->dropColumn('address_gungu');
            $table->dropColumn('project_way');
            $table->dropColumn('now_status');
            $table->dropColumn('detail_content');
            $table->dropColumn('reference_caution');
        });
    }
}
