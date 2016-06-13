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
            $table->timestamps();
            $table->string('title', 255);
            $table->enum('area', ['광고 의뢰', '운영 대행', 'Viral', '1회성 프로젝트']);
            $table->enum('category', ['의료', '법률', '스타트업', '프랜차이즈', '교육/대학교', '쇼핑몰', '기타']);
            $table->string('description', 255);
            $table->string('image1', 45);
            $table->string('image2', 45);
            $table->string('image3', 45);
            $table->string('caption1', 45);
            $table->string('caption2', 45);
            $table->string('caption3', 45);
            $table->string('participation_rate', 45);
            $table->date('from_date');
            $table->date('to_date');

        });
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
