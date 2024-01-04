<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LaporanAbsenController extends Controller
{
   public function index(){
    // $siswa = siswa::where('nis', Auth::guard('siswa')->user()->nis)->first();
    // $absen = Absen::where('siswa_id', $siswa->id)->first();
    $absen = Absen::OrderBy('created_at', 'desc')->with('siswa')->get();
    return view('siswa/absensiswa', compact('absen'));
   }
}
