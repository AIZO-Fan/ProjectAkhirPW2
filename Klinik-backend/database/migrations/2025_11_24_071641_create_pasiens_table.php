<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->unique();
            $table->string('nama');
            $table->string('nik', 16);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
            $table->foreignId('penyakit_id')->nullable()->constrained('penyakits')->onDelete('set null');
            $table->date('tanggal_pemeriksaan');
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->enum('jaminan', ['UMUM', 'BPJS', 'ASURANSI'])->nullable();
            $table->text('alamat');
            $table->timestamps();
            });

    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
