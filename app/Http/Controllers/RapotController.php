<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\kelas;
use App\Models\rapot;
use App\Models\siswa;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class RapotController extends Controller
{
    public function semester(Request $request){
        $keyword = $request->keyword;
        $semester = $request->semester;
        $tahun = $request->tahun;

        $voter = rapot::where('nama', 'LIKE', '%'.$keyword.'%')
        ->orWhere('nim', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
        ->get();
        
        $voter = rapot::where('semester_id', 'LIKE', '%'.$semester.'%')->where('tahun_ajaran_id', 'LIKE','%'.$tahun.'%')->get();
        
        return view('admin.pemilihan.filter', compact('voter', 'semester', 'tahun'));
    }

    public function index (){
        $sakit = 'sakit';
        $izin = 'izin';
        $alpa = 'alpa';
        $siswa = siswa::where('id', Auth::guard('siswa')->user()->id)->first();
        if($siswa){
            $jmlsakit = Absen::where('keterangan',$sakit)->count();
            $jmlizin = Absen::where('keterangan',$izin)->count();
            $jmlalpa = Absen::where('keterangan',$alpa)->count();
        }
        $kelas = kelas::findorfail($siswa->kelas_id);
        // $pai = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->first();
        // $ppkn = Mapel::where('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->first();
        // if ($pai != null && $ppkn != null) {
        //     $Spai = Sikap::where('siswa_id', $siswa->id)->where('mapel_id', $pai->id)->first();
        //     $Sppkn = Sikap::where('siswa_id', $siswa->id)->where('mapel_id', $ppkn->id)->first();
        // } else {
        //     $Spai = "";
        //     $Sppkn = "";
        // }
        $thn = tahunAjaran::all();
        // $rapot = rapot::where->get();
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->get();
        // $mapel = $jadwal->groupBy('pelajaran_id');

        // $keyword = request()->keyword;
        $semester = request()->semester;
        $tahun = request()->tahun;

        // $voter = rapot::where('semester_id', 'LIKE', '%'.$keyword.'%')
        // ->orWhere('tahun_jaran_id', 'LIKE', '%'.$keyword.'%')
        // ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
        // ->get();
        
        $rapot = rapot::where('siswa_id',$siswa->id)->where('semester_id', 'LIKE', '%'.$semester.'%')->where('tahun_ajaran_id', 'LIKE', '%'.$tahun.'%')->get();

        return view('siswa.rapot', compact('siswa','jmlsakit','jmlizin','jmlalpa', 'jadwal','rapot','thn', 'semester', 'tahun'));
    }

    public function print(){
        $sakit = 'sakit';
        $izin = 'izin';
        $alpa = 'alpa';
        $siswa = siswa::where('id', Auth::guard('siswa')->user()->id)->first();
        if($siswa){
            $jmlsakit = Absen::where('keterangan',$sakit)->count();
            $jmlizin = Absen::where('keterangan',$izin)->count();
            $jmlalpa = Absen::where('keterangan',$alpa)->count();
        }
        $kelas = kelas::findorfail($siswa->kelas_id);
        // $pai = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->first();
        // $ppkn = Mapel::where('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->first();
        // if ($pai != null && $ppkn != null) {
        //     $Spai = Sikap::where('siswa_id', $siswa->id)->where('mapel_id', $pai->id)->first();
        //     $Sppkn = Sikap::where('siswa_id', $siswa->id)->where('mapel_id', $ppkn->id)->first();
        // } else {
        //     $Spai = "";
        //     $Sppkn = "";
        // }
       
        $rapot = rapot::where('siswa_id',$siswa->id)->get();
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->get();
        $customPaper = array(0,0,360,360);
        $pdf = PDF::loadview('siswa/rapot_pdf', compact('siswa','jmlsakit','jmlizin','jmlalpa', 'jadwal','rapot'))->setPaper('letter', 'potrait');
        return $pdf->download('rapor.pdf');
    }
}
