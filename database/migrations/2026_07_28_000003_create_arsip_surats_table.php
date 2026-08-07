<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->string('jenis_surat');
            $table->text('persyaratan_surat');
            $table->string('file_surat')->nullable();
            $table->date('tanggal_surat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip_surats');
    }
};
