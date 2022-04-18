<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sempros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mhs_user_id')->unsigned();
            $table->foreign('mhs_user_id')->references('user_id')->on('mahasiswas');
            $table->string('title')->nullable();
            $table->string('adviser1_code')->nullable();
            $table->string('adviser2_code')->nullable();
            $table->string('examiner_code')->nullable();
            $table->date('schedule')->nullable();
            $table->integer('adviser1_score')->nullable();
            $table->integer('adviser2_score')->nullable();
            $table->integer('examiner_score')->nullable();
            $table->string('news_doc')->nullable();
            $table->string('track')->nullable();
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
        Schema::dropIfExists('sempros');
    }
}
