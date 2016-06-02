<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_jobs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('partner_id')->unsigned()->index();
            $table->foreign('partner_id')
                ->references('id')->on('partners')
                ->onDelete('cascade');

            $table->enum('job', array('광고의뢰', '운영대행', 'Viral',
                '1회성프로젝트'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners_jobs');
    }
}
