<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('f_id')->unsigned()->index();
            $table->foreign('f_id')
                ->references('id')->on('faq_masters')
                ->onDelete('cascade');

            $table->String('subject', 255);
            $table->Text('content');
            $table->integer('order_by');

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
        Schema::drop('faqs');
    }
}
