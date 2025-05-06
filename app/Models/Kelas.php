<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'jurusan',
        'tingkat',
        'guru_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // public function siswa()
    // {
    //     return $this->hasMany(Siswa::class);
    // }
}
