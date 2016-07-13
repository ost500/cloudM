<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPartnersCheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function(Blueprint $table){
            $table->dropColumn('check');
        });
        Schema::table('partners', function(Blueprint $table){
            $table->boolean('authenticated');
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
            $table->dropColumn('authenticated');
        });
        Schema::table('partners', function(Blueprint $table){
            $table->boolean('check');
        });
    }
}
