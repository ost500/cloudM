<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartnersFileCheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function(Blueprint $table){
            $table->boolean('proposal_check')->default(0)->after('proposal_origin_name');
            $table->boolean('compnay_check')->default(0)->after('company_origin_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function(Blueprint $table){
            $table->dropColumn('proposal_check');
            $table->dropColumn('compnay_check');
        });
    }
}
