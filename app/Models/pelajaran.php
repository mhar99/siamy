<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelajaran extends Model
{
    protected $fillable = [
        'nama_pelajaran',
    ];

    public $table = 'pelajaran';
}
