<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notikasi extends Model
{
    //
    protected $table = 'notifikasi';
    protected $fillable = [
        'notikasi',
        'siswa_id',
        'guru_id',
        'kelas_id',
        'status',
        'read_at',
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
