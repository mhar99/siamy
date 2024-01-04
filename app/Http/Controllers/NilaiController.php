<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\guru;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\jadwal;
use App\Models\kriteriaNilai;
use App\Models\nilai;
use App\Models\nPengetahuan;
use App\Models\rapot;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NilaiController extends Controller
{
    public function index($id){
        $guru = guru::where('id', Auth::guard('guru')->user()->id)->first();
        $cekJadwal = jadwal::where('guru_id', $guru->id)->where('kelas_id',$id)->count();
        if ($cekJadwal >= 1) {
            $siswa = Siswa::where('kelas_id', $id)->OrderBy('nama', 'asc')->get();
            $jadwal = Jadwal::where('kelas_id', $id)->first();
            $kelas = Kelas::findorfail($id);
            return view('guru/nilai/index', compact('siswa', 'kelas','jadwal'));
        }else {
            return redirect('/nilai')->with('bukan', 'Maaf anda tidak mengajar di kelas ini');
        }
                // $jadwal = jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
                // $kelas = $jadwal->groupBy('kelas_id');
    }

    public function store(Request $request){
        $guru = Guru::findorfail($request->guru_id);
        $aktif = 'aktif';
        $semester = semester::where('status',$aktif)->first();
        $cekJadwal = Jadwal::where('guru_id', $guru->id)->where('kelas_id', $request->kelas_id)->count();

        if ($cekJadwal >= 1) {
            if ($request->tugas && $request->ulhar1 && $request->uts && $request->ulhar2 && $request->uas) {
                $nilai = ($request->tugas + $request->ulhar1 + $request->uts + $request->ulhar2 + (2 * $request->uas)) / 6;
                $nilai = (int) $nilai;
                $deskripsi = kriteriaNilai::where('guru_id', $request->guru_id)->first();
                $isi = kriteriaNilai::where('guru_id', $request->guru_id)->count();
                if ($isi >= 1) {
                    if ($nilai > 89) {
                        Rapot::create([
                            'siswa_id' => $request->siswa_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'pelajaran_id' => $guru->pelajaran_id,
                            'nilaip' => $nilai,
                            'predikatp' => 'A',
                            'deskripsip' => $deskripsi->deskripsi_a,
                            'semester_id' => $semester->id,
                            'tahun_ajaran_id' => $semester->tahun_ajaran_id
                        ]);
                    } else if ($nilai > 79) {
                        Rapot::create([
                            'siswa_id' => $request->siswa_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'pelajaran_id' => $guru->pelajaran_id,
                            'nilaip' => $nilai,
                            'predikatp' => 'B',
                            'deskripsip' => $deskripsi->deskripsi_b,
                            'semester_id' => $semester->id,
                            'tahun_ajaran_id' => $semester->tahun_ajaran_id
                        ]);
                    } else if ($nilai > 69) {
                        Rapot::create([
                            'siswa_id' => $request->siswa_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'pelajaran_id' => $guru->pelajaran_id,
                            'nilaip' => $nilai,
                            'predikatp' => 'C',
                            'deskripsip' => $deskripsi->deskripsi_c,
                            'semester_id' => $semester->id,
                            'tahun_ajaran_id' => $semester->tahun_ajaran_id
                        ]);
                    } else {
                        Rapot::create([
                            'siswa_id' => $request->siswa_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'pelajaran_id' => $guru->pelajaran_id,
                            'nilaip' => $nilai,
                            'predikatp' => 'D',
                            'deskripsip' => $deskripsi->deskripsi_d,
                            'semester_id' => $semester->id,
                            'tahun_ajaran_id' => $semester->tahun_ajaran_id
                        ]);
                    }
                } else {
                    return response()->json(['error' => 'Tolong masukkan deskripsi predikat anda terlebih dahulu!']);
                }
            } else {
            }
            nilai::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'siswa_id' => $request->siswa_id,
                    'kelas_id' => $request->kelas_id,
                    'guru_id' => $request->guru_id,
                    'pelajaran_id' => $guru->pelajaran_id,
                    'tugas' => $request->tugas,
                    'ulhar1' => $request->ulhar1,
                    'uts' => $request->uts,
                    'ulhar2' => $request->ulhar2,
                    'uas' => $request->uas,
                ]
            );
            return response()->json(['success' => 'Nilai pengetahuan siswa berhasil ditambahkan!']);
        } else {
            return response()->json(['error' => 'Maaf guru ini tidak mengajar kelas ini!']);
        }
    }

    public function show($id){
        $guru = Guru::where('id', Auth::user()->id)->first();
        $kelas = Kelas::findorfail($id);
        $siswa = Siswa::where('kelas_id', $id)->get();
        $nilai = Nilai::all();
        return view('guru.nilai.input', compact('guru', 'kelas', 'siswa','nilai'));
    }

    public function tampil($id){
        $guru = Guru::where('id', Auth::user()->id)->first();
        $kelas = Kelas::findorfail($id);
        $siswa = Siswa::where('kelas_id', $id)->get();
        $nilai = Nilai::all();
        return view('guru.nilai.input', compact('guru', 'kelas', 'siswa','nilai'));
    }

    public function ulangan($id)
    {
        $siswa = siswa::findorfail($id);
        $kelas = kelas::findorfail($siswa->kelas_id);
        $jadwal = jadwal::orderBy('pelajaran_id')->where('kelas_id', $kelas->id)->get();
        $mapel = $jadwal->groupBy('pelajaran_id');
        return view('guru/npengetahuan/show', compact('mapel', 'siswa', 'kelas'));
    }

    public function siswa()
    {
        $siswa = siswa::where('nis', Auth::guard('siswa')->user()->nis)->first();
        $kelas = kelas::findorfail($siswa->kelas_id);
        $jadwal = jadwal::where('kelas_id', $kelas->id)->orderBy('pelajaran_id')->get();
        $mapel = $jadwal->groupBy('pelajaran_id');
        return view('siswa/npengetahuan', compact('siswa', 'kelas', 'mapel'));
    }
}
