<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'siswas';
    protected $fillable = [
        'nis',
        'nama',
        'ttl',
        'password',
        'alamat',
        'kelas_id',
        'foto',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    

    public function kelas(){
        return $this->belongsTo(kelas::class);
    }

    public function showSiswa($id_kelas)
    {
        return DB::table('siswas')->where('kelas_id', $id_kelas)->first();
    }

    public function nilai($id){
        $guru = Guru::where('id', Auth::guard('guru')->user()->id)->first();
        $nilai = Rapot::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function ulangan($id)
    {
        $guru = Guru::where('id', Auth::guard()->user()->id)->first();
        $nilai = nilai::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }



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
