<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEvaluationsStarmore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->float('star_result');
            $table->integer('star2');
            $table->integer('star3');
            $table->integer('star4');
            $table->integer('star5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropColumn('star_result');
            $table->dropColumn('star2');
            $table->dropColumn('star3');
            $table->dropColumn('star4');
            $table->dropColumn('star5');
        });
    }
}
