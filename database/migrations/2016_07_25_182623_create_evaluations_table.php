<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('partner_id')->unsigned()->index();
            $table->foreign('partner_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            $table->integer('star');
            $table->text('evaluation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
