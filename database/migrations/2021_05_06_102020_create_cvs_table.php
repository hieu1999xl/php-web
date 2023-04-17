<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->text('username_candidate')->comment('UserName');
            $table->text('email_candidate')->comment('Email');
            $table->text('phone_candidate')->comment('Phone');
            $table->text('description_candidate')->comment('Description');
            $table->text('position')->comment('Position Apply');
            $table->text('times_start_job')->comment('Times Start Job');
            //file_cv save url to save storage file
            $table->text('file_cv')->comment('File CV');
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
        Schema::dropIfExists('cvs');
    }
}
