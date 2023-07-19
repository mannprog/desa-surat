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
        Schema::create('admin_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'hindu', 'buddha', 'khonghucu']);
            $table->enum('pendidikan_terakhir', ['sma', 'd1', 'd2', 'd3', 's1', 's2', 's3']);
            $table->enum('jabatan', ['admin', 'kepaladesa', 'kasipelayanan']);
            $table->date('tmt_sk');
            $table->text('no_sk');
            $table->enum('status', ['belumkawin', 'kawin', 'ceraihidup', 'ceraimati']);
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('pasangan')->nullable();
            $table->text('anak')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_details');
    }
};
