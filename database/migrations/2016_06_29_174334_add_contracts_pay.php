<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractsPay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function(Blueprint $table){
            $table->boolean('charge_check');
            $table->date('charge_date');
            $table->enum('charge_type',array('선불','후불','분납'));
            $table->date('contract_date');
            $table->date('start_work_date');
            $table->date('finish_work_date');
            $table->string('type_pay', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function(Blueprint $table){
            $table->dropColumn('charge_check');
            $table->dropColumn('charge_date');
            $table->dropColumn('charge_type');
            $table->dropColumn('contract_date');
            $table->dropColumn('start_work_date');
            $table->dropColumn('finish_work_date');
            $table->dropColumn('type_pay');
        });
    }
}
