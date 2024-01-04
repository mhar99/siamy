<?php


namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class HalamanSiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tanggal = Carbon::now()
        ->translatedFormat('l, d F Y');
        $jadwal = jadwal::OrderBy('created_at', 'asc')->with('kelas')->get();
        return view('siswa/siswahome',compact('tanggal','jadwal'));
    }

    public function profil()
    {
        return view('siswa/profilsiswa');
    }

    public function updateProfil(Request $request){
        $request->validate([
            'nis' => 'min:10|max:10|',
            'nama' => 'required',
        ],[
            'nis.required' => 'NIS tidak boleh kosong',
            'nis.max' => 'NIS harus 10 karakter',
            'nis.min' => 'NIS harus 10 karakter',
            'nama.required' => 'Nama siswa tidak boleh kosong',

        ]);


        // if(!$validator->passes()){
        //     return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        // }else{

        // }

        $query = siswa::find(Auth::guard('siswa')->user()->id);
        $query->update([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
        ]);
        return redirect('/siswa/profil')->with('success','Profil berhasil diperbaharui');
    }

    function updatePicture(Request $request){
        $path = 'fguru/images/';
        $file = $request->file('siswa_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Gagal mengubah foto profil']);
        }else{
            //Get Old picture
            $oldPicture = siswa::find(Auth::guard('siswa')->user()->id)->getAttributes()['foto'];

            if( $oldPicture != '' ){
                if( Storage::exists(public_path($path.$oldPicture))){
                Storage::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = siswa::find(Auth::guard('siswa')->user()->id)->update(['foto'=>$new_name]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Gagal mengubah foto profil!']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Foto profil berhasil diubah!']);
            }
        }

    }

     function changePassword(Request $request){
        //Validate form
        $request->validate([
            'oldpassword'=>'required',
             'newpassword'=>'required',
             'cnewpassword'=>'required|same:newpassword'
         ],[
             'oldpassword.required'=>'Masukan password saat ini',
             'newpassword.required'=>'Masukan password baru',
             'cnewpassword.required'=>'Masukan kembali password baru',
             'cnewpassword.same'=>'Konfirmasi password baru harus sesuai dengan password baru'
         ]);
        // if( !$validator->fails() ){
        //     return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        // }else{
         $update = siswa::find(Auth::user()->id);
         $update->update(['password'=>Hash::make($request->newpassword)]);

        //  if( !$update ){
        //     return redirect('/guru/profil')->with('success','Profil gagal diperbaharui');
        //  }else{
            return redirect('/siswa/profil')->with('berhasil','Password berhasil diubah');         }
        // }

}
