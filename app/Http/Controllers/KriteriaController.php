<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\kriteriaNilai;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::where('id', Auth::user()->id)->first();
        $nilai = kriteriaNilai::where('guru_id', $guru->id)->first();
        return view('guru.nilai.kriteriaNilai', compact('nilai','guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::orderBy('kode')->get();
        return view('admin.nilai.index', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $guru = Guru::where('id', $request->id)->first();

        kriteriaNilai::updateOrCreate(
            [
                'guru_id' => $guru->id,
                'kkm' => $request->kkm,
                'deskripsi_a' => $request->predikat_a,
                'deskripsi_b' => $request->predikat_b,
                'deskripsi_c' => $request->predikat_c,
                'deskripsi_d' => $request->predikat_d,
            ]
        );

        return redirect()->back()->with('success', 'Data nilai kkm dan predikat berhasil diperbarui!');
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
        // 
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
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
