<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractsPayRadio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function(Blueprint $table){
            $table->integer('start_pay_ratio');
            $table->integer('middle_pay_ratio');
            $table->integer('finish_pay_ratio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('start_pay_ratio');
            $table->dropColumn('middle_pay_ratio');
            $table->dropColumn('finish_pay_ratio');
        });
    }
}
