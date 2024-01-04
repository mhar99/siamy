@section('title')
Detail Kelas
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
    <div class="row">
  <div class="col-10 grid-margin" style="margin-left: 100px">
    <div class="card">
        <div style="margin-top: 20px; margin-left: 10px">
            <h3>Detail Kelas</h3>
            <hr>
        </div>
<div class="card-body">
    <div class="row">
      <div class="col-md-12">
          <table>
              <tr>
                  <td width="50%">Nama Kelas</td>
                  <td width="15%">:</td>
                  <td>{{ $kelas->nama_kelas }}</td>
              </tr>
              <tr>
                  <td>Jumlah Siswa</td>
                  <td>:</td>
                  <td>{{ $kelas->jumlah_siswa }}</td>
              </tr>
              <tr>
                  <td>Tahun Ajaran</td>
                  <td>:</td>
                  <td>{{ $kelas->tahunAjaran->tahun_ajaran }}</td>
              </tr>
              <tr>
                  <td>Wali Kelas</td>
                  <td>:</td>
                  <td>{{ $kelas->guru->nama_guru }}</td>
              </tr>
              <tr>
                  <td>Daftar Siswa</td>
                  <td>:</td>
              </tr>
          </table>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
      <div class="table table-bordered table-striped" style="margin-left:2%; margin-right:2%;">
        <table class="table">
              <thead>
                    <tr style="text-align: center">
                        <th width="5%">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                      </tr>
              </thead>
              <tbody>
                @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama }}</td>
                      @endforeach
              </tbody>
          </table>
      </div>
      </div>
      <a href="/kelas"><button type="button" class="btn btn-primary" style="margin-left: 930px">Kembali</button></a>
    </div>
   
  </div>
    </div>

@endsection