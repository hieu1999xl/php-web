<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributeMetainfoIntoLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->text('meta_og_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->text('meta_og_url');
        });
    }
}
