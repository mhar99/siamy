@section('title')
Detail Siswa
@endsection
@extends('admin/layouts/temp')
@section('main')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Detail Siswa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">NIS : </label>
          {{$siswa->nis}}
        <div class="form-group">
          <label for="exampleInputPassword1">Nama Siswa : </label>
          {{$siswa->nama}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Kelas : </label>
            {{$siswa->kelas->nama_kelas}}
          </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tempat Tanggal lahir : </label>
            {{$siswa->ttl}}
          </div>
        <div class="form-group">
          <label for="exampleInputFile">Alamat : </label>
          {{$siswa->alamat}}
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Foto : </label>
            <img src={{ $siswa->foto }} width="200px">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="/siswa"><button type="button" class="btn btn-primary">Kembali</button></a>
      </div>
    </form>
  </div>
@endsection