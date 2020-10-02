<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelArTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_ar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_glb');
            $table->string('model_usdz');
            $table->integer('view_id')->unsigned()->nullable();
            $table->foreign('view_id')->references('id')->on('general_view')->onDelete('cascade');
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
        Schema::dropIfExists('model_ar');
    }
}
