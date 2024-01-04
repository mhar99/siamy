<?php

use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuAdController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RapotController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\HalamanGuruController;
use App\Http\Controllers\HalamanSiswaController;
use App\Http\Controllers\jampelController;
use App\Http\Controllers\LaporanAbsenController;
use App\Http\Controllers\NilaiKeterampilanController;
use App\Http\Controllers\tahunAjaranController;
use App\Http\Controllers\SemesterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return::view('land');
});

Route::view('/formlogin','v_login')->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth:admin,sadmin','revalidate']], function (){
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/tambahsiswa', [SiswaController::class, 'create']);
Route::get('/siswa/detailsiswa/{id}', [SiswaController::class, 'detail']);
Route::get('/siswa/ubahsiswa/{id}', [SiswaController::class, 'edit']);
Route::post('/ubah/{id}',[SiswaController::class, 'update']);
Route::get('/hapussiswa/{id}',[SiswaController::class,'delete'])->name('delete');

Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/kelas/tambahkelas', [KelasController::class, 'create']);
Route::get('/kelas/detailkelas/{id}', [KelasController::class, 'detail']);
Route::get('/kelas/ubahkelas/{id}', [KelasController::class, 'edit']);
Route::post('/updatekelas/{id}',[KelasController::class, 'update']);
Route::get('/hapuskelas/{id}',[KelasController::class,'delete'])->name('delete');

Route::get('/guru', [GuruController::class, 'index']);
Route::post('/guru', [GuruController::class, 'store']);
Route::get('/guru/tambahguru/', [GuruController::class, 'create']);
Route::get('/guru/detailguru/{id}', [GuruController::class, 'detail']);
Route::get('/guru/ubahguru/{id}', [GuruController::class, 'edit']);
Route::post('/updateguru/{id}',[GuruController::class, 'update']);
Route::get('/hapusguru/{id}',[GuruController::class,'delete'])->name('delete');


Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'store']);
Route::get('/admin/tambahadmin/', [AdminController::class, 'create']);
Route::get('/admin/ubahadmin/{id}', [AdminController::class, 'edit']);
Route::post('/updateadmin/{id}',[AdminController::class, 'update']);
Route::get('/hapusadmin/{id}',[AdminController::class,'delete'])->name('delete');
Route::get('/SuperAdmin/dashboard', [SuAdController::class, 'index']);

Route::get('/jadwal', [JadwalController::class, 'index']);
Route::get('/jadwal/tambah',[JadwalController::class, 'tambah']);
Route::post('/jadwal/tambah',[JadwalController::class, 'insert']);
Route::get('getguru/{id}',[JadwalController::class, 'dropdownGuru']);
Route::get('/jadwal/show/{id}',[JadwalController::class, 'jadwalKelas']);

Route::get('/mapel', [MapelController::class, 'index']);
Route::post('/pelajaran', [MapelController::class, 'store']);
Route::get('/pelajaran/tambahpelajaran/', [MapelController::class, 'create']);
Route::get('/pelajaran/ubahpelajaran/{id}', [MapelController::class, 'edit']);
Route::post('/updatemapel/{id}',[MapelController::class, 'update']);
Route::get('/hapuspelajaran/{id}',[MapelController::class,'delete'])->name('delete');

Route::get('/jampelajaran', [jampelController::class, 'index']);
Route::post('/jampelajaran', [jampelController::class, 'store']);
Route::get('/jampelajaran/tambahjampelajaran/', [jampelController::class, 'create']);
Route::get('/jampelajaran/ubahjampelajaran/{id}', [jampelController::class, 'edit']);
Route::post('/updatejam/{id}',[jampelController::class, 'update']);
Route::get('/hapusjampelajaran/{id}',[jampelController::class,'delete'])->name('delete');

Route::get('/tahunajaran', [tahunajaranController::class, 'index']);
Route::post('/tahunajaran', [tahunajaranController::class, 'store']);
Route::get('/tahunajaran/tambahtahunajaran/', [tahunajaranController::class, 'create']);
Route::get('/tahunajaran/ubahtahunajaran/{id}', [tahunajaranController::class, 'edit']);
Route::post('/updatetahun/{id}',[tahunajaranController::class, 'update']);
Route::get('/hapustahunajaran/{id}',[tahunajaranController::class,'delete'])->name('delete');

Route::get('/semester', [semesterController::class, 'index']);
Route::post('/semester', [semesterController::class, 'store']);
Route::get('/semester/ubahstatus/aktif/{id}', [semesterController::class, 'statusAktif']);
Route::get('/semester/ubahstatus/non-aktif/{id}', [semesterController::class, 'statusNon']);
Route::get('/semester/tambahsemester/', [semesterController::class, 'create']);
Route::get('/semester/ubahsemester/{id}', [semesterController::class, 'edit']);
Route::post('/updatesemester/{id}',[semesterController::class, 'update']);
Route::get('/hapussemester/{id}',[semesterController::class,'delete'])->name('delete');
});

Route::get('/SuperAdmin/dashboard', [SuAdController::class, 'index'])->name('home');
   


Route::group(['middleware' => ['auth:guru','revalidate']], function (){
Route::get('/guru/home',[HalamanGuruController::class, 'home']);
Route::get('/guru/profil', [HalamanGuruController::class, 'profil']);
Route::post('/guru/updateprofil',[HalamanGuruController::class,'updateProfil'])->name('guruUpdateProfil');
Route::post('/guru/fotoprofil',[HalamanGuruController::class,'updatePicture'])->name('guruPictureUpdate');
Route::post('/guru/gantipassword',[HalamanGuruController::class,'changePassword'])->name('adminChangePassword');
Route::view('/test','guru/test');
Route::get('/absen', [AbsenController::class, 'absen']);
Route::get('/absen/show/{id_kelas}',[AbsenController::class, 'kelas'])->name('absen');
Route::post('/absen/simpan',[AbsenController::class, 'simpanAbsen'])->name('simpanAbsen');
Route::get('/absen/rekap',[AbsenController::class, 'kelolaAbsen']);
Route::get('/absen/rekap/showkelas',[AbsenController::class, 'showKelas']);
Route::get('/absen/rekap/show/{id}',[AbsenController::class, 'rekap']);
Route::get('/absen/ubahabsen/{id}', [AbsenController::class, 'edit']);
Route::post('/updateabsen/{id}',[AbsenController::class, 'update']);
Route::get('/kriteria',[KriteriaController::class, 'index']);
Route::post('/kriteria/input',[KriteriaController::class, 'store']);
Route::get('/nilai/input/{id}',[NilaiController::class, 'show']);
Route::get('/keterampilan/input/{id}',[NilaiKeterampilanController::class, 'show']);
Route::get('/nilai/data/{id}',[NilaiController::class, 'index']);
Route::post('/nilai/simpan',[NilaiController::class,'store'])->name('simpanNilai');
Route::get('/nilai/tinput/{id}', [NilaiController::class, 'tampil'])->name('tinput');
Route::get('/nilai/pengetahuan', [HalamanGuruController::class, 'nilai'])->name('nilai');
Route::get('/nilai/keterampilan', [NilaiKeterampilanController::class, 'nilai']);
Route::get('/keterampilan/predikat', [NilaiKeterampilanController::class, 'predikat']);
Route::post('/keterampilan/simpan', [NilaiKeterampilanController::class, 'store'])->name('keterampilanSimpan');
Route::post('/absensi', [HalamanGuruController::class, 'dataAbsen']);
Route::get('/data_absen', [HalamanGuruController::class, 'getdataAbsen']);
});

Route::group(['middleware' => ['auth:siswa','revalidate']], function (){
Route::get('/siswa/home',[HalamanSiswaController::class, 'index']);
Route::get('/siswa/absen',[LaporanAbsenController::class, 'index']);
Route::get('/siswa/rapor',[RapotController::class, 'index']);
Route::get('/siswa/rapor/cetak',[RapotController::class,'print']);
Route::get('/siswa/profil', [HalamanSiswaController::class, 'profil']);
Route::post('/siswa/updateprofil',[HalamanSiswaController::class,'updateProfil'])->name('siswaUpdateProfil');
Route::post('/siswa/fotoprofil',[HalamanSiswaController::class,'updatePicture'])->name('siswaPictureUpdate');
Route::post('/siswa/gantipassword',[HalamanSiswaController::class,'changePassword'])->name('siswaChangePassword');
});