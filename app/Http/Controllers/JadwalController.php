<?php

namespace App\Http\Controllers;
use App\Models\kelas;
use App\Models\hari;
use App\Models\guru;
use App\Models\pelajaran;
use App\Models\Jadwal;
use App\Models\jampel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JadwalController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->m_jadwal = new Jadwal();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        return view('admin/jadwal/index', compact('kelas'));
    }


    public function tambah(){
        $kode_jadwal = ['kode_jadwal' => $this->m_jadwal->kode_jadwal()];

        $guru = guru::all();
        $kelas = Kelas::all();
        $pelajaran = pelajaran::all();
        $hari = Hari::all();
        $jam = jampel::all();
        return view('admin/jadwal/tambah', $kode_jadwal,compact('kelas','guru', 'hari', 'pelajaran','jam'));
    }

    public function dropdownGuru($id){
        $guru = guru::where('pelajaran_id',$id)->get();
        return response()->json($guru);
    }

    public function insert(){
        // dd(request()->all());
        Request()->validate([
            'hari_id' => ['required',Rule::unique('jadwal')
            ->where('jampel_id', request()->jampel_id)->where('kelas_id', request()->kelas_id)],
            'kelas_id' => ['required',Rule::unique('jadwal')
            ->where('jampel_id', request()->jampel_id)->where('guru_id', request()->guru_id)],
            'pelajaran_id' => ['required',Rule::unique('jadwal')
            ->where('hari_id', request()->hari_id)->where('kelas_id', request()->kelas_id)],
            'guru_id' => ['required',Rule::unique('jadwal')
            ->where('jampel_id', request()->jampel_id)->where('kelas_id', request()->kelas_id)->where('hari_id', request()->hari_id)],
            'jampel_id' => ['required',Rule::unique('jadwal')
            ->where('guru_id', request()->guru_id)->where('kelas_id', request()->kelas_id)],
          ],[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
              'hari_id.required' => 'Hari tidak boleh kosong',
              'hari_id.unique' => 'Jadwal bentrok! pilih ulang hari!',
              'pelajaran_id.required' => 'Mata pelajaran tidak boleh kosong',
              'guru_id.required' => 'Pengajar tidak boleh kosong',
              'kelas_id.unique' => 'Jadwal bentrok! pilih ulang kelas!',
              'kelas_id.required' => 'Kelas tidak boleh kosong',
              'guru_id.unique' => 'Jadwal bentrok! pilih ulang guru!',
              'jampel_id.required' => 'Waktu tidak boleh kosong',
              'jampel_id.unique' => 'Jadwal bentrok! pilih ulang waktu!',
              'pelajaran_id.required' => 'Pelajaran tidak boleh kosong',
              'pelajaran_id.uniq' => 'Jadwal bentrok! pilih ulang pelajaran!'
          ]);

        $data = [
            'kode_jadwal' => Request()->kode_jadwal,
            'pelajaran_id' => Request()->pelajaran_id,
            'hari_id' => Request()->hari_id,
            'kelas_id' => Request()->kelas_id,
            'guru_id' => Request()->guru_id,
            'jampel_id' => Request()->jampel_id,
            
        ];
       Jadwal::create($data);
        return back()->with('success', 'Jadwal berhasil dibuat');
    }

    public function jadwalKelas($id){
        $jadwal = jadwal::where('kelas_id', $id)->get();
        return view('admin/jadwal/show', compact('jadwal'));
    }
}
