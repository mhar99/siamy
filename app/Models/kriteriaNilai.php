<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteriaNilai extends Model
{
    protected $fillable = ['guru_id', 'kkm', 'deskripsi_a', 'deskripsi_b', 'deskripsi_c', 'deskripsi_d'];

    public function guru()
    {
        return $this->belongsTo(guru::class)->withDefault();
    }

    public $table = 'kriteria_nilai';
}
