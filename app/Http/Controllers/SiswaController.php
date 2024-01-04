<?php


namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
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
        return view('admin/siswa', [
            'siswas' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kelas = kelas::all();
        return view('admin/siswatambah', compact('kelas'));
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
            'nis' => 'required|min:10|max:10',
            'nama' => 'required',
            'ttl' => 'required',
            'password' => 'required|min:8',
            'alamat' => 'required|max:100',
            'kelas_id' => 'required',
        ],[
            'nis.required' => 'NIS tidak boleh kosong',
            'nis.min' => 'NIS harus 10 karakter',
            'nis.max' => 'NIS harus 10 karakter',
            'nama.required' => 'Nama siswa tidak boleh kosong',
            'ttl.required' => 'Tempat, Tanggal lahir tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'kelas_id.required' => 'Kelas tidak boleh kosong'
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect('/siswa')->with('success','Data siswa berhasil ditambahkan');
    }

    public function detail($id)
    {
        $siswa = siswa::find($id);
        return view('admin/detailsiswa', compact('siswa'));
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
        $siswa = Siswa::find($id);
        $kelas = kelas::all();
        return view('admin/ubahsiswa', compact('siswa','kelas'));
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
            'nis' => 'required|min:10|max:10',
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required|max:100',
            'kelas_id' => 'required',
        ],[
            'nis.required' => 'NIS tidak boleh kosong',
            'nis.min' => 'NIS harus 10 karakter',
            'nis.max' => 'NIS harus 10 karakter',
            'nama.required' => 'Nama siswa tidak boleh kosong',
            'ttl.required' => 'Tempat, Tanggal lahir tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'kelas_id.required' => 'Kelas tidak boleh kosong'
        ]);
        $siswa = Siswa::find($id);
        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect('/siswa')->with('success','Data siswa berhasil diubah');
    }

    public function delete($id){
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('success','Data siswa berhasil dihapus');
        
    }

    public function destroy(Siswa $siswa)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
