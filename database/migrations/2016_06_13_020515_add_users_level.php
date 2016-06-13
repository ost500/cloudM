<?php


use Illuminate\Database\Migrations\Migration;

class AddUsersLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->enum('level', array('개인', '팀', '개인 사업자', '법인 사업자'));
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
            $table->dropcolumn('level');
        });
    }
}
