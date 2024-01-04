<?php


namespace App\Http\Controllers;

use App\Models\pelajaran;
use Illuminate\Http\Request;

class MapelController extends Controller
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
        return view('admin/mapel', [
            'pelajarans' => pelajaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/mapeltambah');
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
            'nama_pelajaran' => 'required'
        ],[
            'nama_pelajaran.required' => 'Nama pelajaran tidak boleh kosong' 
        ]);

        pelajaran::create($validasi);

        return redirect('/mapel')->with('success','Data pelajaran berhasil ditambahkan');
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
        $mapel = pelajaran::find($id);
        return view('admin/ubahmapel', compact('mapel'));
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
            'nama_pelajaran' => 'required'
        ],[
            'nama_pelajaran.required' => 'Nama pelajaran tidak boleh kosong' 
        ]);

        $pelajaran = pelajaran::find($id);
        $pelajaran->update($request->all());
        return redirect('/mapel')->with('success','Data pelajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $pelajaran = pelajaran::find($id);
        $pelajaran->delete();
        return redirect('/mapel')->with('success','Data pelajaran berhasil dihapus');
        
    }

    public function destroy(pelajaran $pelajaran)
    {
       
    }
}
