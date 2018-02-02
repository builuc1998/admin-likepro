<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostmeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('postmeta', function (Blueprint $table) {
            $table->increments('id');

            $table->string('uid')->default('null')->nullable(false);
            $table->string('postid')->default('null')->nullable(false);
            $table->string('time_create')->default('null')->nullable(false);
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
