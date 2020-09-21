<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('wallet')->unique();
            $table->string('password');
            $table->string('mobile');
            $table->string('balance')->nullable();
            $table->string('bitcoin')->nullable();
            $table->integer('tauth');
            $table->integer('tfver');
            $table->integer('status')->nullable();
            $table->integer('emailv')->nullable();
            $table->integer('smsv')->nullable();
            $table->string('vsent')->nullable();
            $table->string('vercode')->nullable();
            $table->string('secretcode')->nullable();
            $table->integer('docv')->nullable();
            $table->integer('refid')->nullable();
            $table->integer('buy')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
