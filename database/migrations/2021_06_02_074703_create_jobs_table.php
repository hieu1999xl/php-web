<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('job_name');
            $table->text('job_intro')->nullable();
            $table->text('job_description');
            $table->text('job_requirement');
            $table->text('job_benefits');
            $table->string('job_location')->nullable();
            $table->string('job_time')->nullable();;
            $table->string('job_title')->nullable();
            $table->string('job_salary')->nullable();
            $table->string('slug')->nullable();
            //trang thai cua job 0 la open 1 la close
            $table->integer('status')->default(0);
            $table->date('job_left_time')->nullable();


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
        Schema::dropIfExists('jobs');
    }
}
