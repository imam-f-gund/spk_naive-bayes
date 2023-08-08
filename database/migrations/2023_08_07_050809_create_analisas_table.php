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
        Schema::create('analisas', function (Blueprint $table) {
            $table->id();
            $table->string('berkualitas');
            $table->string('buruk');
            $table->enum('klasifikasi', ['berkualitas', 'buruk']);
            $table->enum('prediksi', ['sesuai', 'tidak sesuai']);
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
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
        Schema::dropIfExists('analisas');
    }
};
