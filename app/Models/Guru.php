<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'guru';

    protected $fillable = [
        'name',
        'email',
        'password',
        'nip',
        'role',
        'is_active',
        'last_active_at',
        'status',
        'verification_file',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_active_at' => 'datetime',
    ];

    // Relasiin guru dengan kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function siswas()
{
    return $this->hasMany(Siswa::class);
}

}
