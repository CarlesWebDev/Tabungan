<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tabungan extends Model
{
    //
    protected $table = 'tabungans';

    protected $fillable = [
        'nama_siswa',
        'nama_guru',
        'id_siswa',
        'guru_id',
        'tanggal',
        'jenis_penarikan',
        'jumlah',
        'keterangan'
    ];

    // Relasi Ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }



    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
