<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_files', function (Blueprint $table) {
            $table->integer('u_id')->unsigned()->index();
            $table->foreign('u_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('p_id')->unsigned()->index();
            $table->foreign('p_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');

            $table->integer('f_id')->unsigned();

            $table->string('source_name', 255);
            $table->string('file_name', 255);
            $table->integer('file_size')->unsigned();

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
        Schema::drop('projects_files');
    }
}
