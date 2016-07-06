<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManToMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('man_to_men', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('u_id')->unsigned()->index();
            $table->foreign('u_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('title', 255);
            $table->text('content');
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
        Schema::drop('man_to_men');
    }
}
