<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartnersJobsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners_jobs', function (Blueprint $table) {

            $table->integer('number')->default(10);
            $table->string('experience',255)->default("10년 이상");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners_jobs', function ($table) {
            $table->dropColumn('number');
            $table->dropColumn('experience');
        });
    }
}
