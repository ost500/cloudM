<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropProjectsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumns('projects', ['project_way', 'now_status', 'reference_caution'])) {
            Schema::table('projects', function ($table) {

                $table->dropColumn('project_way');
                $table->dropColumn('now_status');

                $table->dropColumn('reference_caution');
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumns('projects', ['project_way', 'now_status', 'reference_caution'])) {
            Schema::table('projects', function ($table) {
                $table->text('project_way');
                $table->text('now_status');
                $table->text('reference_caution');
            });
        }
    }
}
