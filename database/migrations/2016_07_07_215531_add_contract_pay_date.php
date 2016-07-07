<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractPayDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function(Blueprint $table){
            $table->date('start_pay_date');
            $table->date('middle_pay_date');
            $table->date('finish_pay_date');
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
            $table->dropColumn('start_pay_date');
            $table->dropColumn('middle_pay_date');
            $table->dropColumn('finish_pay_date');
        });
    }
}
