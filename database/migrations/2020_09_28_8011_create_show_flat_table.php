<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_flat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('folder_flat',255);
            $table->unsignedInteger('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
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
        Schema::dropIfExists('show_flat');
    }
}
