<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPortfoliosArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_prefix = DB::getTablePrefix();
        DB::statement("ALTER TABLE `" . $table_prefix . "portfolios` CHANGE `area` `area` SET(
        '네이버CPC', '언론보도','구글광고', '페이스북광고', '매체 기타',
            '네이버SEO', '언론보도', '컨텐츠배포', '체험단모집', '바이럴 기타',
            '블로그', '기타SNS', '홈페이지', '운영대행 기타',
            '개발', '디자인', '웹툰', '영상', '1회성 프로젝트 기타',
            'TV광고','신문광고','라디오광고','지하철광고','버스광고','잡지광고','외부광고','오프라인 기타'
        );");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function(Blueprint $table){
            $table->dropColumn('area');
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->enum('area', array('네이버CPC', '구글광고', '페이스북광고', '매체 기타',
                '네이버SEO', '언론보도', '컨텐츠 배포', '체험단 모집', '바이럴 기타',
                '블로그', '페이스북페이지', '기타SNS', '홈페이지', '운영대행 기타',
                '개발', '디자인', '웹툰', '영상', '1회성 프로젝트 기타',
                'TV광고','신문광고','라디오광고','지하철광고','버스광고','잡지광고','외부광고','오프라인 기타'
            ));
        });
    }
}
