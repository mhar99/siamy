<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class m_superAdmin extends  Authenticatable
{
    public $table = 'sadmin';
    protected $fillable = [
        'nama',
        'username',
        'password'
    ];
}
