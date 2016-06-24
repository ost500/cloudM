<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApplicationsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->integer('money');
            $table->string('duration', 45);
            $table->text('content');
            $table->boolean('has_portfolio');
            $table->string('file_name', 45);
            $table->string('origin_name', 45);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('money');
            $table->dropColumn('duration');
            $table->dropColumn('content');
            $table->dropColumn('has_portfolio');
            $table->dropColumn('file_name');
            $table->dropColumn('origin_name');
        });
    }
}
