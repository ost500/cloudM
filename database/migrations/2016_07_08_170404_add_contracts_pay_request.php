<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractsPayRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function(Blueprint $table){
            $table->date('start_pay_request_date');
            $table->date('middle_pay_request_date');
            $table->date('finish_pay_request_date');
            $table->date('start_pay_accept_date');
            $table->date('middle_pay_accept_date');
            $table->date('finish_pay_accept_date');
            $table->date('start_pay_give_date');
            $table->date('middle_pay_give_date');
            $table->date('finish_pay_give_date');
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
            $table->dropColumn('start_pay_request_date');
            $table->dropColumn('middle_pay_request_date');
            $table->dropColumn('finish_pay_request_date');
            $table->dropColumn('start_pay_accept_date');
            $table->dropColumn('middle_pay_accept_date');
            $table->dropColumn('finish_pay_accept_date');
            $table->dropColumn('start_pay_give_date');
            $table->dropColumn('middle_pay_give_date');
            $table->dropColumn('finish_pay_give_date');
        });
    }
}
