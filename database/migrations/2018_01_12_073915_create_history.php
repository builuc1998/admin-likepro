<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id');

            $table->string('userid')->default('null')->nullable(false);
            $table->string('postid')->default('null')->nullable(false);
            $table->string('type')->default('null')->nullable(false);
            $table->string('status')->default('wait')->nullable(false);
            $table->string('me')->default('0')->nullable(false);
            $table->string('dachay')->default('0')->nullable(false);
            $table->string('tong')->default('0')->nullable(false);
            $table->string('content')->default('null')->nullable(false);
            $table->string('uid')->default('null')->nullable(false);
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
