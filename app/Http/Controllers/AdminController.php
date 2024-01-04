<?php


namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        return view('admin/admin', [
            'admins' => admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admintambah');
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
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required'
        ],[
            'nama_admin.required' => 'Nama admin tidak boleh kosong',
            // 'nama_admin.alpha' => 'Nama admin tidak boleh berisi atau mengandung simbol maupun angka',
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        admin::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin')->with('success','Data admin berhasil ditambahkan');
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
        $admin = admin::find($id);
        return view('admin/ubahadmin', compact('admin'));
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
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required'
        ],[
            'nama_admin.required' => 'Nama admin tidak boleh kosong',
            // 'nama_admin' => 'Nama admin tidak boleh berisi atau mengandung simbol maupun angka',
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $admin = admin::find($id);
        $admin->update($request->all());
        return redirect('/admin')->with('success','Data admin berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $admin = admin::find($id);
        $admin->delete();
        return redirect('/admin')->with('success','Data admin berhasil dihapus');
        
    }

    public function destroy(admin $admin)
    {
       
    }
}
