<?php


namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa;
use App\Models\guru;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;

class KelasController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        return view('admin/kelas', [
            'kelas' => kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtg = guru::all();
        $thn = tahunAjaran::all();
        return view('admin/kelastambah',compact('dtg','thn'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request()->all();
        $request->validate([
            'nama_kelas' => 'required',
            'jumlah_siswa' => 'required',
            'guru_id' => 'required',
            'tahun_ajaran_id' => 'required',
        ],[
            'nama_kelas.required' => 'Nama Kelas tidak boleh kosong',
            'jumlah_siswa.required' => 'Jumlah siswa tidak boleh kosong',
            'guru_id.required' => 'Wali kelas tidak boleh kosong',
            'tahun_ajaran_id.required' => 'Tahun ajaran tidak boleh kosong',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'jumlah_siswa' => $request->jumlah_siswa,
            'guru_id' => $request->guru_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        return redirect('/kelas')->with('success','Data kelas berhasil ditambahkan');
    }

    public function detail($id)
    {
        $siswa = Siswa::where('kelas_id', $id)->OrderBy('nama', 'asc')->get();
        $kelas = Kelas::findorfail($id);
        return view('admin/kelas/detailkelas', compact('siswa', 'kelas'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $dtg = guru::all();
        $thn = tahunAjaran::all();
        return view('admin/ubahkelas', compact('kelas','dtg','thn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jumlah_siswa' => 'required',
            'guru_id' => 'required',
            'tahun_ajaran_id' => 'required',
        ],[
            'nama_kelas.required' => 'Nama Kelas tidak boleh kosong',
            'jumlah_siswa.required' => 'Jumlah siswa tidak boleh kosong',
            'guru_id.required' => 'Wali kelas tidak boleh kosong',
            'tahun_ajaran_id.required' => 'Tahun ajaran tidak boleh kosong',
        ]);


        $kelas = Kelas::find($id);
        $kelas->update($request->all());
        return redirect('/kelas')->with('success','Data kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('success','Data kelas berhasil dihapus');
        
    }

    public function destroy(kelas $kelas)
    {
       
    }
}
