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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('nis')->unique();
            // $table->string('kelas');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('cascade')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamp('last_active_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
