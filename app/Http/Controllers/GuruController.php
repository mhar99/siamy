<?php


namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\pelajaran;
use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Backtrace\File;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        return view('admin/guru', [
            'gurus' => guru::all()
        ]);
    }

    public function create()
    {
        $dtg = pelajaran::all();
        return view('admin/gurutambah', compact('dtg'));
    }

    public function store(Request $request)
    {
        // return request()->all();
            $request->validate([
                'nip' => 'required|min:17|max:18',
                'nama_guru' => 'required',
                'password' => 'required',
                'pelajaran_id' => 'required',
            ],
            [
                'nip.required' => 'NIP tidak boleh kosong',
                'nip.min' => 'NIP harus 17-18 karakter',
                'nip.max' => 'NIP harus 17-18 karakter',
                'nama_guru.required' => 'Nama guru tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'pelajaran_id.required' => 'Mata pelajaran tidak boleh kosong',
            ]);

        $data = [
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'password' => Hash::make($request->password),
            'pelajaran_id' => $request->pelajaran_id,
        ];

        guru::create($data);

        return redirect('/guru')->with('success','Data guru berhasil ditambahkan');
    }

    public function detail($id)
    {
        $guru = guru::find($id);
        return view('admin/detailguru', compact('guru'));
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
        $guru = guru::find($id);
        $dtg = pelajaran::all();
        return view('admin/ubahguru', compact('guru','dtg'));
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
        request()->validate([
            'nip' => 'required|min:17|max:18',
            'nama_guru' => 'required',
            'pelajaran_id' => 'required',
        ],
        [
            'nip.required' => 'NIP tidak boleh kosong',
            'nip.min' => 'NIP harus 17-18 karakter',
            'nip.max' => 'NIP harus 17-18 karakter',
            'nama_guru.required' => 'Nama guru tidak boleh kosong',
            'pelajaran_id.required' => 'Mata pelajaran tidak boleh kosong',
        ]);

        $guru = guru::find($id);
        $guru->update($request->all());
        return redirect('/guru')->with('success','Data guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $guru = guru::find($id);
        $guru->delete();
        return redirect('/guru')->with('success','Data guru berhasil dihapus');
        
    }

    public function destroy(guru $guru)
    {
       
    }

   
 }
