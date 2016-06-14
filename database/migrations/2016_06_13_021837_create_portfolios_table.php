<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned()->index();
            $table->foreign('partner_id')
                ->references('id')->on('partners')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('title', 255);
            $table->enum('area', ['광고 의뢰', '운영 대행', 'Viral', '1회성 프로젝트','기타']);
            $table->enum('category', ['의료', '법률', '스타트업', '프랜차이즈', '교육/대학교', '쇼핑몰', '기타']);
            $table->string('description', 255);
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('participation_rate');
            $table->string('image1', 45);
            $table->string('image2', 45);
            $table->string('image3', 45);
            $table->string('caption1', 45);
            $table->string('caption2', 45);
            $table->string('caption3', 45);
            $table->boolean('iscloudm')->default(false);
//            $table->enum('keyword', array('a', 'b', 'c'));
        });
//        $table_prefix = DB::getTablePrefix();
//        DB::statement("ALTER TABLE `" . $table_prefix . "portfolios` CHANGE `keyword` `keyword` SET('a', 'b', 'c');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('portfolios');
    }
}
