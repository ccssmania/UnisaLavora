<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableInEntrevistaRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("in_entrevista_request", function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('oferta_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('status')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('user_id')->on('company');
            $table->foreign('oferta_id')->references('id')->on('ofertas');
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
        //
    }
}
