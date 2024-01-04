<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Absen extends Model
{
    protected $fillable = [
        'siswa_id',
        'keterangan'
    ];

    public $table = 'absen';

    public function siswa(){
        return $this->belongsTo(siswa::class);
    }

    public function pelajaran(){
        return $this->belongsTo(pelajaran::class);
    }   
    
    public function kelas(){
        return $this->belongsTo(kelas::class);
    }   

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y (H:i)');
    }
}
