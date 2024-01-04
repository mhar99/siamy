<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahunAjaran extends Model
{
    protected $fillable = [
        'tahun_ajaran',
    ];

    public $table = 'tahun_ajaran';
    public function kelas(){
        return $this->hasMany(kelas::class);
    }
}
