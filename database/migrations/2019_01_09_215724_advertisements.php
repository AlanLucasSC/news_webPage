<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advertisements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('category_id');
            $table->string('url');
            
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files');
            $table->foreign('category_id')->references('id')->on('advertising_categories');
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
        Schema::dropIfExists('advertisements');
    }
}
