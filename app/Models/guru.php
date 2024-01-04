<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nip',
        'nama_guru',
        'password',
        'foto',
        'pelajaran_id',
    ];

    public $table = 'gurus';

    public function pelajaran(){
        return $this->belongsTo(pelajaran::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFotoAttribute($value){
        if($value){
            return asset('fguru/images/'.$value);
        }else{
            return asset('fguru/images/no-image.png');
        }
    }
}
