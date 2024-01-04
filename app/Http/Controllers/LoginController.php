<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[//ini adalah konversi keterangan validasi form dalam bahasa Indonesia]
            'username.required' => 'Username tidak boleh kosong',
            'username.regex' => 'Masukan username dengan benar',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }
        elseif (Auth::guard('siswa')->attempt(['nis' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect('/siswa/home');
        }
        elseif (Auth::guard('guru')->attempt(['nip' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect('/guru/home');
        }
         elseif (Auth::guard('sadmin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/admin/dashboard');
        }
        // elseif (Auth::attempt(['username' => $request->email, 'password' => $request->password])){
        //     return redirect('dasboard');
        // }
                return back()->with('gagal', 'Login Gagal! Username atau Password salah!');
    }


    public function logout(Request $request){
        if (Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }elseif (Auth::guard('siswa')->check()){
            Auth::guard('siswa')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }elseif (Auth::guard('guru')->check()){
            Auth::guard('guru')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }elseif (Auth::guard('sadmin')->check()){
            Auth::guard('sadmin')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }
        return redirect('/');
    }
}
