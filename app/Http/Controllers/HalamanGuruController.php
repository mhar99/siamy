<?php


namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\guru;
use App\Models\kelas;
use App\Models\jadwal;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Backtrace\File;

class HalamanGuruController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->m_siswa = new siswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function nilai(Request $request){
        $guru = guru::where('id', Auth::guard('guru')->user()->id)->first();
        $kelas = jadwal::where('guru_id', $guru->id)->get();
        return view('guru/nilai/nilai', compact('kelas'));
    }

    public function dataAbsen(Request $request){
        // dd(request()->all());
        $columns = [
            "id",
            'nama',
        ];

        $orderBy = $columns[request()->input("order.0.column")];
        $data = siswa::select('*');

        $recordFiltered = $data->get()->count();
        $data->orderBy($orderBy,request()->input("order.0.dir"))->get();
        $recordTotal = $data->count();

        return response()->json([
            'draw'=>request()->input('draw'),
            'recordsTotal'=>$recordTotal,
            'recordsFiltered'=>$recordFiltered,
            'data'=>$data
        ]);

        if($request->input('kelas')!=null){
            $data = $data->where('kelas_id',$request->kelas);
        }

    }

    public function profil()
    {
        return view('guru/profilguru');
    }
    
    public function home()
    {
        $tanggal = Carbon::now()
        ->translatedFormat('l, d F Y');
        $jadwal = jadwal::OrderBy('created_at', 'asc')->with('kelas')->get();
        return view('guru/homeguru',compact('tanggal','jadwal'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updateProfil(Request $request){
        $request->validate([
            'nip' => 'required|min:17|max:18|',
            'nama_guru' => 'required',
        ],[
            'nip.required' => 'NIP tidak boleh kosong',
            'nip.max' => 'NIP harus 17-18 karakter',
            'nip.min' => 'NIP harus 17-18 karakter',
            'nama_guru.required' => 'Nama guru tidak boleh kosong',

        ]);


        // if(!$validator->passes()){
        //     return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        // }else{

        // }

        $query = guru::find(Auth::guard('guru')->user()->id);
        $query->update([
            'nip'=>$request->nip,
            'nama_guru'=>$request->nama_guru,
        ]);
        return redirect('/guru/profil')->with('success','Profil berhasil diperbaharui');
    }

    function updatePicture(Request $request){
        $path = 'fguru/images/';
        $file = $request->file('guru_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Gagal mengubah foto profil']);
        }else{
            //Get Old picture
            $oldPicture = siswa::find(Auth::guard('guru')->user()->id)->getAttributes()['foto'];

            if( $oldPicture != '' ){
                if( Storage::exists(public_path($path.$oldPicture))){
                Storage::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = siswa::find(Auth::guard('guru')->user()->id)->update(['foto'=>$new_name]);

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
         $update = guru::find(Auth::user()->id);
         $update->update(['password'=>Hash::make($request->newpassword)]);

        //  if( !$update ){
        //     return redirect('/guru/profil')->with('success','Profil gagal diperbaharui');
        //  }else{
            return redirect('/guru/profil#settings')->with('berhasil','Password berhasil diubah');         }
        // }
    //}

    public function getdataAbsen(){
        return siswa::all();
    }

 }
