<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProjectsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function ($table) {
            $table->enum('area', ['광고 의뢰', '운영 대행', 'Viral', '1회성 프로젝트'])->after('id');

            $table->dropColumn('category');



        });
        Schema::table('projects', function ($table) {
            $table->enum('category', ['의료', '법률', '스타트업', '프랜차이즈', '교육/대학교', '쇼핑몰','기타'])->after('area');
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
            $table->dropColumn('category');
            $table->dropColumn('area');
        });

        Schema::table('projects', function ($table) {
            $table->string('category', 45);
        });


    }
}
