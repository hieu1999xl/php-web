<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_uploads', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('link_button')->nullable();
            $table->text('image');
            $table->integer('oder')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('img_uploads');
    }
}
