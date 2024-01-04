<?php

namespace App\Http\Controllers;

use App\Models\jampel;
use Illuminate\Http\Request;

class jampelController extends Controller
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
        return view('admin/jampel/index', [
            'jampel' => jampel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jampel/tambah');
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
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ],[
            'jam_mulai' => 'Jam mulai tidak boleh kosong',
            'jam_selesai' => 'Jam selesai tidak boleh kosong' 
        ]);

        jampel::create($validasi);

        return redirect('/jampelajaran')->with('success','Data pelajaran berhasil ditambahkan');
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
        $jampel = jampel::find($id);
        return view('admin/jampel/ubah', compact('jampel'));
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
            'jam_mulai' => 'required'
        ],[
            'jam_mulai.required' => 'Nama jampel tidak boleh kosong' 
        ]);

        $jampel = jampel::find($id);
        $jampel->update($request->all());
        return redirect('/jampelajaran')->with('success','Data jampel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $jampel = jampel::find($id);
        $jampel->delete();
        return redirect('/jampelajaran')->with('success','Data jampel berhasil dihapus');
        
    }

    public function destroy(jampel $pelajaran)
    {
       
    }
}
