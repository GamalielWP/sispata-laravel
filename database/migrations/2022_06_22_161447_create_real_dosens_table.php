<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nidn');
            $table->string('kode_dosen');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('prodi');
            $table->string('tlp');
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
        Schema::dropIfExists('real_dosens');
    }
}
