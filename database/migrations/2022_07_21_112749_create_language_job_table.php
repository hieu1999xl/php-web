<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('languages_job');
        Schema::create('languages_job', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id')->unsigned()->nullable();
            $table->string('language')->default('en');
            $table->string('job_name')->nullable();
            $table->text('job_intro')->nullable();
            $table->text('job_description')->nullable();
            $table->text('job_requirement')->nullable();
            $table->text('job_benefits')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_time')->nullable();;
            $table->string('job_title')->nullable();
            $table->string('job_salary')->nullable();
            $table->string('slug')->nullable();
            $table->integer('position_quantity')->nullable(false)->default(0);
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
        Schema::dropIfExists('languages_job');
    }
}
