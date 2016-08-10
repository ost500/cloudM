<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('content',255);
            $table->text('who');
            $table->integer('numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('email_logs');
    }
}
