<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
// use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('siswas')->insert([
            'nis' => '12345678910',
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('  '),
            // 'password_plaintext' => 'siswaMurid123',
            // 'kelas' => 'XI RPL 1',
            'kelas_id' => 1,
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
}
