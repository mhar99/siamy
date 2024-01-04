<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    public $table = 'semester';

    protected $fillable = [
        'nama_semester', 'status', 'tahun_ajaran_id'
    ];

    public function tahunAjaran(){
        return $this->belongsTo(tahunAjaran::class);
    }
}
