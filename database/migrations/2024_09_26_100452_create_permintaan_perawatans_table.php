<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan_perawatans', function (Blueprint $table) {
            $table->id();

            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('sarana_id')->references('id')->on('saranas');
            // $table->foreign('lokasi_id')->references('id')->on('lokasis');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('sarana_id');
            $table->foreign('sarana_id')->references('id')->on('saranas');
            $table->unsignedBigInteger('lokasi_id');
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
            $table->string('tanggal_perawatan');
            $table->string('Tanggal_selesai');
            // $table->foreignId('sarana_id')->constrained('saranas');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_perawatans');
    }
};
