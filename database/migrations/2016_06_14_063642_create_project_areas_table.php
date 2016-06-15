<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_areas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('p_id')->unsigned()->index();
            $table->foreign('p_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');

            $table->string('area', 255);

            $table->integer('price')->unsigned();
            $table->integer('commission')->unsigned();

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
        Schema::drop('project_areas');
    }
}
