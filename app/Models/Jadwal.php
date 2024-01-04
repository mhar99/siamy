<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Jadwal extends Model
{
   public $table = 'jadwal';

   protected $fillable = [
      'kode_jadwal',
      'pelajaran_id',
      'hari_id',
      'kelas_id',
      'guru_id',
      'jampel_id',
   ];

   public function addData($data)
   {
    DB::table('jadwal')->insert($data);
   }


   public static function kode_jadwal()
    {
    	$kode_max = DB::table('jadwal')->max('id');
    	$addNol = '';
    	$kode_max = str_replace("PEG", "", $kode_max);
    	$kode_max = (int) $kode_max + 1;
        $incrementKode = $kode_max;

    	if (strlen($kode_max) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode_max) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode_max == 3)) {
    		$addNol = "0";
    	}

    	$kode_baru = "JD".$addNol.$incrementKode;
    	return $kode_baru;
    }

    public function hari(){
        return $this->belongsTo(hari::class);
    }

    public function pelajaran(){
        return $this->belongsTo(pelajaran::class);
    }

    public function guru(){
        return $this->belongsTo(guru::class);
    }

    public function kelas(){
        return $this->belongsTo(kelas::class);
    }

    public function nilai($id)
    {
      $siswa = Siswa::where('id', Auth::guard('siswa')->user()->id)->first();
      $nilai = Rapot::where('siswa_id', $siswa->id)->where('pelajaran_id', $id)->first();
      return $nilai;
    }

    public function kkm($id){
        $kkm = kriteriaNilai::where('guru_id',$id)->first();
        return $kkm['kkm'];
    }

    public function cek_nilai($id){
        $data = json_decode($id, true);
        $pengetahuan = nilai::where('siswa_id', $data['siswa'])->where('pelajaran_id', $data['pelajarans'])->first();
        return $pengetahuan;
    }

    public function cekRapot($id){
        $data = json_decode($id, true);
        $rapot = rapot::where('siswas_id', $data['siswa'])->where('pelajarans_id', $data['pelajarans'])->first();
        return $rapot;
    }

    public function jampel(){
        return $this->belongsTo(jampel::class);
    }
}
