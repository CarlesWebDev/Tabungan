<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'siswa';

    protected $fillable = [
        'nis',
        'name',
        'email',
        'kelas',
        'password',
        'role',
        'is_active',
        'kelas_id',
        'last_active_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_active_at' => 'datetime',
    ];

    // Relasiin siswa dengan kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,);
    }

    // relasi dengan tabungan
    public function tabungan()
{
    return $this->hasMany(Tabungan::class, 'siswa_id');
}



}

