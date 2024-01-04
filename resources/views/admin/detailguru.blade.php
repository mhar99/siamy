@section('title')
Detail Guru
@endsection
@extends('admin/layouts/temp')
@section('main')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Detail Guru</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">NIP : </label>
          {{$guru->nip}}
        <div class="form-group">
          <label for="exampleInputPassword1">Nama Guru : </label>
          {{$guru->nama_guru}}
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Mata Pelajaran : </label>
          {{$guru->pelajaran->nama_pelajaran}}
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Foto : </label>
            <img src={{ $guru->foto }} width="200px">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="/guru"><button type="button" class="btn btn-primary">Kembali</button></a>
      </div>
    </form>
  </div>
@endsection