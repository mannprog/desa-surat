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
        Schema::create('warga_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('no_kk', 16)->unique();
            $table->string('nik', 16)->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('gol_darah')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'hindu', 'buddha', 'khonghucu']);
            $table->enum('status', ['belumkawin', 'kawin', 'ceraihidup', 'ceraimati']);
            $table->string('pekerjaan')->default('belumbekerja');
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('pasangan')->nullable();
            $table->text('anak')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga_details');
    }
};
