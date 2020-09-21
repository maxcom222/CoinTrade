<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->increments('id',100);
            $table->string('name');
            $table->string('gateimg')->nullable();
            $table->string('minamo');
            $table->string('maxamo');
            $table->string('charged');
            $table->string('chargep');
            $table->string('rate');
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('currency')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('gateways');
    }
}
