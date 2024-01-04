<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\guru;
use App\Models\pelajaran;
use App\Models\admin;
use app\models\jadwal;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Jsiswa = Siswa::count();
        $Jkelas = kelas::count();
        $Jpelajaran = pelajaran::count();
        $Jguru = guru::count();
        $Jadmin = admin::count();
        return view('admin/v_dashboard', compact(
            'Jsiswa',
            'Jkelas',
            'Jpelajaran',
            'Jguru',
            'Jadmin'
        ));
    }

    public function data(){

    }
}
