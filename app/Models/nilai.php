<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    
    protected $fillable = [
        'siswa_id', 
        'kelas_id', 
        'guru_id', 
        'pelajaran_id',
        'tugas',
         'ulhar1', 
         'uts', 
         'ulhar2', 
         'uas'
    ];

    public $table = 'nilai';
}
