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
        Schema::create('detail_perawatans', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('sarana_id')->constrained('saranas');
            //$table->foreignId('laporan_perawatan_id')->constrained('laporan_perawatans');   
            $table->unsignedBigInteger('laporan_id');
            $table->foreign('laporan_id')->references('id')->on('laporan_perawatans');
            $table->unsignedBigInteger('sarana_id');
            $table->foreign('sarana_id')->references('id')->on('saranas');
            $table->string('upload_poto' );
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perawatans');
    }
};
