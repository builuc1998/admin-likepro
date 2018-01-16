<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clone', function (Blueprint $table) {
            $table->increments('id');

            $table->string('uid')->default('null')->nullable(false);
            $table->string('email')->default('null')->nullable(false);
            $table->string('password')->default('null')->nullable(false);
            $table->string('cookie')->default('null')->nullable(false);
            $table->string('token')->default('null')->nullable(false);
            $table->TEXT('note')->nullable(false);
            $table->TEXT('birthday')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('firstname')->default('null')->nullable(false);
            $table->string('country')->default('null')->nullable(false);
            $table->string('cmtid')->default('null')->nullable(false);
            $table->string('photoid')->default('null')->nullable(false);
            $table->TEXT('linksp')->nullable(false);
            $table->string('status')->default('new')->nullable(false);

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
