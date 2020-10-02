<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdivisionViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdivision_view', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('folder_image',255);
            $table->unsignedInteger('project_id');
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
        Schema::dropIfExists('subdivision_view');
    }
}
