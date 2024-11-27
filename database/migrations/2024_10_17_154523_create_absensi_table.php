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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->date('tanggal_absensi');
            $table->string('foto_in')->nullable();
            $table->string('foto_out')->nullable();
            $table->time('check_in');
            $table->time('check_out')->nullable();
            $table->string('gps_location_in')->nullable();
            $table->string('gps_location_out')->nullable();
            $table->enum('status', ['ontime', 'terlambat', 'tidak hadir']);
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
