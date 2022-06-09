<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mhs_user_id')->unsigned();
            $table->foreign('mhs_user_id')->references('id')->on('users');
            $table->bigInteger('dsn_user_id')->unsigned();
            $table->foreign('dsn_user_id')->references('id')->on('users');
            $table->integer('ide')->nullable();
            $table->integer('solusi')->nullable();
            $table->integer('analisa')->nullable();
            $table->integer('penulisan')->nullable();
            $table->integer('kemandirian_presentasi')->nullable();
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
        Schema::dropIfExists('scores');
    }
}
