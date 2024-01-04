<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jampel extends Model
{
    public $table = 'jampel';

    protected $fillable = [
        'jam_mulai','jam_selesai'
    ];
}
