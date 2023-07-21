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
        Schema::create('surat_kks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamp('tanggal_request');
            $table->string('kk_lama');
            $table->string('file_pendukung');
            $table->enum('status', ['selesai', 'tolak', 'proses', 'belumditentukan'])->default('belumditentukan');
            $table->date('tanggal_dibuat')->nullable();
            $table->string('spkk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kks');
    }
};
