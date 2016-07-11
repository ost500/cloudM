<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractCId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function(Blueprint $table){
            $table->integer('c_id')->after('u_id');
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
            $table->dropColumn('c_id');
        });
    }
}
