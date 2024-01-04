<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;

class SemesterController extends Controller
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
        return view('admin/Semester/index', [
            'semester' => Semester::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun = tahunAjaran::all();
        return view('admin/semester/tambah', compact('tahun'));
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
        $validasi = $request->validate([
            'tahun_ajaran_id' => 'required',
            'nama_semester' => 'required'
        ],[
            'tahun_ajaran_id' => 'Tahun ajaran tidak boleh kosong',
            'nama_semester' => 'Semester tidak boleh kosong' 
        ]);

        Semester::create($validasi);

        return redirect('/semester')->with('success','Data pelajaran berhasil ditambahkan');
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
        $tahun = tahunAjaran::all();
        $semester = Semester::find($id);
        return view('admin/semester/ubah', compact('semester','tahun'));
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
            'tahun_ajaran_id' => 'required',
            'nama_semester' => 'required'
        ],[
            'tahun_ajaran_id' => 'Tahun ajaran tidak boleh kosong',
            'nama_semester' => 'Semester tidak boleh kosong' 
        ]);

        $Semester = Semester::find($id);
        $Semester->update($request->all());
        return redirect('/semester')->with('success','Data Semester berhasil diubah');
    }

    public function statusAktif($id){
        $semester = Semester::find($id);
        $cekstatus = semester::where('status','aktif')->count();
        if ($cekstatus == 1) {
            return redirect('/semester')->with('danger','Hanya boleh memilih 1 semester yang aktif! Non aktifkan semester lain terlebih dahulu');
        } else {
                $semester->update(['status' => 'aktif']);
            return redirect('/semester')->with('success','Berhasil mengaktifkan semester');
        }
        
    }

    public function statusNon($id){
        $semester = Semester::find($id);
                $semester->update(['status' => 'tidak aktif']);
            return redirect('/semester')->with('success','Berhasil non-aktifkan semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $Semester = Semester::find($id);
        $Semester->delete();
        return redirect('/semester')->with('success','Data Semester berhasil dihapus');
        
    }

    public function destroy(Semester $pelajaran)
    {
       
    }
}
