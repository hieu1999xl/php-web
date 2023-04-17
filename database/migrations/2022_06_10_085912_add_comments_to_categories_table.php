<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('type')
                ->comment('Type = 1: CaseStudies/Industries, Type = 2: news, Type = 3: Shareholder, Type = 0: other')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('type')
                ->comment('Type = 1: CaseStudies/Industries, Type = 2: news, Type = 3: Shareholder, Type = 4: other')->change();
        });
    }
}
