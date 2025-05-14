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
       Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->timestamp('read_at')->nullable();
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->onDelete('cascade');
            $table->foreignId('guru_id')->nullable()->constrained('gurus')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('cascade');
            $table->text('notikasi');
            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
