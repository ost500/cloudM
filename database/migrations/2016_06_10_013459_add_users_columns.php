<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->enum('company_type', array('개인', '팀', '개인 사업자', '법인 사업자'));
            $table->date('BOD')->default(date('Y-m-d'));
            $table->string('fax_num', 45);
            $table->enum('sex', array('남성','여성'));
            $table->string('address',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropcolumn('company_type');
            $table->dropcolumn('BOD');
            $table->dropcolumn('fax_num');
            $table->dropcolumn('sex');
            $table->dropcolumn('address');
        });
    }
}
