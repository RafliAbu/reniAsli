<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->text('alamat');
            $table->string('no_telepon', 20);
            $table->string('email_desa');
            $table->text('profil_desa')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();
            $table->string('nama_kepala_desa')->default('MARABAIK HARAHAP');
            $table->string('foto_kepala_desa')->nullable();
            $table->string('foto_profil_desa')->nullable();
            $table->string('foto_struktur')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturans');
    }
};
