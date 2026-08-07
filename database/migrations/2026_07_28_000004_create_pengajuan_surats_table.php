<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('jenis_surat');
            $table->string('nama_lengkap');
            $table->string('nik', 20)->nullable();
            $table->text('keperluan');
            $table->string('file_berkas')->nullable();
            $table->enum('status', ['Menunggu', 'Dalam Proses', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->date('tanggal_pengajuan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};
