<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $fillable = [
        'nama_kelas',
        'jumlah_siswa',
        'tahun_ajaran_id',
        'guru_id'
    ];

    public $table = 'kelas';

    public function tahunAjaran(){
        return $this->belongsTo(tahunAjaran::class);
    }

    public function guru(){
        return $this->belongsTo(guru::class);
    }

    public function siswa(){
        return $this->hasMany(siswa::class);
    }
}
