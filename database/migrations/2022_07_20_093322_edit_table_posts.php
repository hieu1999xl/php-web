<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('intro');
            $table->dropColumn('content');
            $table->dropColumn('slug');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_og_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('intro');
            $table->text('content');
            $table->string('slug', 191);
            $table->string('meta_title', 191);
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->string('meta_og_url', 191);
        });
    }
}
