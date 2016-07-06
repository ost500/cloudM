<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartnersFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->string('proposal_file_name', 45);
            $table->string('proposal_origin_name', 45);
            $table->string('company_file_name', 45);
            $table->string('company_origin_name', 45);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('proposal_file_name');
            $table->dropColumn('proposal_origin_name');
            $table->dropColumn('company_file_name');
            $table->dropColumn('company_origin_name');
        });
    }
}
