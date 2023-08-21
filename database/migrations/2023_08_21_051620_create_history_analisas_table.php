<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_analisa', function (Blueprint $table) {
            $table->id();
            $table->string('warna');
            $table->string('bau');
            $table->string('butir');
            $table->string('hama');
            $table->string('nilai_berkualitas');
            $table->string('nilai_buruk');
            $table->enum('klasifikasi', ['berkualitas', 'buruk']);
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
        Schema::dropIfExists('history_analisas');
    }
};
