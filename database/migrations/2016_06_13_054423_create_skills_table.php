<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned()->index();
            $table->foreign('partner_id')
                ->references('id')->on('partners')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('title', 255);
            $table->integer('number');
            $table->string('experience',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skills');
    }
}
