<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartnersArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners_jobs', function ($table) {
            $table->enum('area', array('의료', '법률', '스타트업', '프랜차이즈', '교육/대학교', '쇼핑몰'));


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('partners_jobs', 'area')) {
            Schema::table('partners_jobs', function ($table) {
                $table->dropColumn('area');
            });
        }
    }
}
