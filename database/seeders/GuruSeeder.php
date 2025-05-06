<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('gurus')->insert([
            'nip' => '111111111111111111',
            'name' => 'Ragil Mahardika S.Pd S.Si M.Pdi',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('guruPemegangsemua123'),
            'role' => 'teacher',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
}
