<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("experience", function(Blueprint $table){
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->string('skill_name');
            $table->string('file_ext')->nullable();
            $table->foreign('student_id')->references('id')->on('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
