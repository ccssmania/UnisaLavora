<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("student", function(Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->bigInteger('phone');
            $table->string('address');
            $table->string('cv')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
