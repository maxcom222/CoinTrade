<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('Website');
            $table->string('subtitle')->default('Sub Title');
            $table->string('color')->default('336699');
            $table->string('cur')->default('USD');
            $table->string('cursym')->default('$');
            $table->integer('reg')->default('1');
            $table->integer('emailver')->default('1');
            $table->integer('smsver')->default('1');
            $table->integer('decimal')->default('2');
            $table->integer('emailnotf')->default('1');
            $table->integer('smsnotf')->default('1');
            $table->string('startdate')->nullable();
            $table->string('blockapi')->nullable();
            $table->string('blockpin')->nullable();
            $table->string('adminwallet')->nullable();
            $table->string('concrg')->nullable();
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
        Schema::dropIfExists('generals');
    }
}
