<?php

namespace App\Http\Controllers;
use App\Models\Absen;
use App\Models\guru;
use App\Models\Jadwal;
use App\Models\kelas;
use App\Models\pelajaran;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->m_siswa = new siswa;
    }

    public function absen(Request $request){
        $guru = guru::where('id', Auth::guard('guru')->user()->id)->first();
        $kelas = jadwal::where('guru_id', $guru->id)->get();
        return view('guru/nilai/nilai', compact('kelas'));
    }

    public function kelas($id_kelas)
    {
        $siswa = Siswa::where('kelas_id', $id_kelas)->OrderBy('nama', 'asc')->get();
        $jadwal = Jadwal::where('kelas_id', $id_kelas)->first();
        $kelas = Kelas::findorfail($id_kelas);
        return view('guru/absen/show', compact('siswa', 'kelas','jadwal'));
    }

    public function simpanAbsen(Request $request){
        $data = [];
        $error = 1;

        Request()->validate([
            'keterangan' => 'required',
          ],[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
              'keterangan.required' => 'Isi keterangan absen dengan lengkap',
          ]);

        for($i = 0; $i < count($request->get('siswa_id')); $i++){
            $data[] = [
                'siswa_id' => $request->get('siswa_id')[$i],
                'pelajaran_id' => $request->get('pelajaran_id')[$i],
                'kelas_id' => $request->get('kelas_id')[$i],
                'keterangan' => $request->get('keterangan')[$i],
            ];
        }

        if(count($data) > 0){
            $error = '';
        }
        Absen::upsert($data, ['siswa_id','pelajaran_id','keterangan']);
        return back()->with('error', $error);

        // $siswa_id = $request->siswa_id;
        // $keterangan = 'hadir';
        // dd($request->all());
        // for($i = 0; $i < count($siswa_id); $i++){
        //     $datasave = [
        //         'siswa_id' => $siswa_id,
        //         'keterangan' => $keterangan,
        //     ];
        //     DB::table('absen')->insert($datasave);
        // }
        // eturn back()r->with('success','Data absen berhasil tersimpan');
    }

    public function kelolaAbsen(){
        $absen = pelajaran::OrderBy('nama_pelajaran', 'asc')->get();
        $kelas = absen::all();
        return view('guru.absen.rekap', compact('absen','kelas'));
    }

    public function rekap($id)
    {
        $absen = absen::where('kelas_id', $id)->get();
        $kelas = Kelas::findorfail($id);
        return view('guru/absen/kelolaabsen', compact('absen', 'kelas'));
    }

    public function showKelas(){
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        return view('guru/absen/showKelas', compact('kelas'));
    }

    public function edit($id)
    {
        $absen = absen::find($id);
        return view('guru/absen/ubahabsen', compact('absen'));
    }

    public function update(Request $request, $id)
    {
        $absen = absen::find($id);
        $absen->update($request->all());
        return redirect()->back()->with('success','Data absen berhasil diubah');
    }
}
