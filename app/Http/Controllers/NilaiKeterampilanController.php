<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\guru;
use App\Models\siswa;
use App\Models\rapot;
use App\Models\jadwal;
use App\Models\kriteriaNilai;
use App\Models\semester;
use Illuminate\Support\Facades\Auth;

class NilaiKeterampilanController extends Controller
{
    public function nilai(Request $request){
        $guru = guru::where('id', Auth::guard('guru')->user()->id)->first();
        $kelas = jadwal::where('guru_id', $guru->id)->get();
        return view('guru/nilai/nilai', compact('kelas'));
    }

    public function show($id)
    {
        $guru = Guru::where('id', Auth::user()->id)->first();
        $kelas = Kelas::findorfail($id);
        $siswa = Siswa::where('kelas_id', $id)->get();
        return view('guru.nilai.nilaiKeterampilan', compact('guru', 'kelas', 'siswa'));
    }

    public function store(Request $request)
    {
        $guru = Guru::findorfail($request->guru_id);
        $aktif = 'aktif';
        $semester = semester::where('status',$aktif);
        $cekJadwal = Jadwal::where('guru_id', $guru->id)->where('kelas_id', $request->kelas_id)->count();
        if ($cekJadwal >= 1) {
            Rapot::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'siswa_id' => $request->siswa_id,
                    'kelas_id' => $request->kelas_id,
                    'guru_id' => $request->guru_id,
                    'pelajaran_id' => $guru->pelajaran_id,
                    'nilaik' => $request->nilai,
                    'predikatk' => $request->predikat,
                    'deskripsik' => $request->deskripsi,
                    'semester_id' => $semester->id,
                    'tahun_ajaran_id' => $semester->tahun_ajaran_id
                ]
            );
            return response()->json(['success' => 'Nilai rapot siswa berhasil ditambahkan!']);
        } else {
            return response()->json(['error' => 'Maaf guru ini tidak mengajar kelas ini!']);
        }

        
    }

    public function predikat(Request $request)
    {
        $nilai = kriteriaNilai::where('guru_id', $request->id)->first();
        if ($request->nilai > 89) {
            $newForm[] = array(
                'predikat' => 'A',
                'deskripsi' => $nilai->deskripsi_a,
            );
        } else if ($request->nilai > 79) {
            $newForm[] = array(
                'predikat' => 'B',
                'deskripsi' => $nilai->deskripsi_b,
            );
        } else if ($request->nilai > 59) {
            $newForm[] = array(
                'predikat' => 'C',
                'deskripsi' => $nilai->deskripsi_c,
            );
        } else {
            $newForm[] = array(
                'predikat' => 'D',
                'deskripsi' => $nilai->deskripsi_d,
            );
        }
        return response()->json($newForm);
    }

}
