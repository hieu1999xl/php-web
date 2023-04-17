<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //0 -> binh-thuong 1->hot 2->sieu hot
            $table->integer('hot')->nullable(false)->default(0);
            //so luong vi tri can tuyen cho jobs
            $table->integer('position_quantity')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('hot');
            $table->dropColumn('status');
            $table->dropColumn('position_quantity');
        });
    }
}
