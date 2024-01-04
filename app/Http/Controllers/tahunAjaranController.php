<?php

namespace App\Http\Controllers;

use App\Models\tahun;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;

class tahunAjaranController extends Controller
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
        return view('admin/tahunajaran/index', [
            'tahun' => tahunAjaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tahunajaran/tambah');
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
            'tahun_ajaran' => 'required',
        ],[
            'tahub_ajaran' => 'Tahun ajaran tidak boleh kosong'
        ]);
        tahunAjaran::create($validasi);

        return redirect('/tahunajaran')->with('success','Data pelajaran berhasil ditambahkan');
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
        $tahun = tahunAjaran::find($id);
        return view('admin/tahunajaran/ubah', compact('tahun'));
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
            'tahun_ajaran' => 'required'
        ],[
            'tahun_ajaran.required' => 'Nama tahun tidak boleh kosong' 
        ]);

        $tahun = tahunAjaran::find($id);
        $tahun->update($request->all());
        return redirect('/tahunajaran')->with('success','Data tahun berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $tahun = tahunAjaran::find($id);
        $tahun->delete();
        return redirect('/tahunajaran')->with('success','Data tahun berhasil dihapus');
        
    }

    public function destroy(tahunAjaran $pelajaran)
    {
       
    }
}
