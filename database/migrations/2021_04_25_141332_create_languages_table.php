<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->integer('prefer_id');
            $table->text('title')->nullable();
            $table->text('descrition')->nullable();
            $table->text('body')->nullable();
            //EN, JA, VI
            $table->string('language', 256)->default('EN')->comment('Language');
            //Type = 0 => category, Type = 1 => Post, Type = 3 => imguplpoad
            $table->integer('type')->nullable()->default(0)->comment('1:posts, 2:img_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
