<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_project', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unique()->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
            $table->string('address');
            $table->string('logo');
            $table->string('thumbnail');
            $table->integer('phone');
            $table->string('link_register',255);
            $table->string('link_film',255);
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
        Schema::dropIfExists('info_project');
    }
}
