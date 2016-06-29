<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interestings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('u_id')->unsigned()->index();
            $table->foreign('u_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('p_id')->unsigned()->index();
            $table->foreign('p_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');

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
        Schema::drop('interestings');
    }
}
