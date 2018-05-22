<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("contratos", function(Blueprint $table){
            $table->increments("id");
            $table->integer('student_id')->unsigned();
            $table->foreign("student_id")->references("id")->on("student");
            $table->string("company_id")->references("id")->on("company");
            $table->integer("oferta_id")->unsigned();
            $table->foreign("oferta_id")->references("id")->on("ofertas");
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
