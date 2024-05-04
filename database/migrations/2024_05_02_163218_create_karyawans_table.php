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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nomor_induk_karyawan')->unique();
            $table->text('alamat');
            $table->enum('cabang', ['Bandung', 'Garut', 'Sukabumi', 'Cianjur']);
            $table->enum('organisasi', ['Operasional', 'Supporting']);
            $table->enum('jabatan', ['Staff IT', 'Spv IT', 'Manager IT', 'Direktur Umum']);
            $table->enum('level_jabatan', ['Staff', 'Spv', 'Manager', 'Direktur']);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
