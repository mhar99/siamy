<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapot extends Model
{
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'guru_id', 
        'pelajaran_id',
        'nilaip', 
        'predikatp',
        'deskripsip', 
        'nilaik',
        'predikatk',
        'deskripsik',
        'semester_id',
        'tahun_ajaran_id'
    ];

    public $table = 'rapot';

    public function pelajaran(){
        return $this->belongsTo(pelajaran::class);
    }

    public function kkm($id){
        $kkm = kriteriaNilai::where('guru_id',$id)->first();
        return $kkm['kkm'];
    }
}
