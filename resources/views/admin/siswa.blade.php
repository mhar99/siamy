@section('title')
Data Siswa
@endsection
@extends('admin/layouts/temp')
@section('main')
<div class="content-wrapper">
  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3>Data Siswa</h3>
              <p class="card-description">
                  <a href="/siswa/tambahsiswa"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Data</button></a>
              </p>
              
              @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif

              <div class="table-responsive">
                  <table class="table table-hover" id="example1">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Tempat Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($siswas as $siswa)
                              
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->ttl }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>
                              <a href="/siswa/detailsiswa/{{ $siswa->id }}"><label class="btn btn-success" style="padding: 3%">Detail</label></a>
                              <a href="/siswa/ubahsiswa/{{ $siswa->id }}"><label class="btn btn-warning" style="padding: 3%">Ubah</label></a>
                              <a href="/hapussiswa/{{ $siswa->id }}"><label class="btn btn-danger" style="padding: 3%" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>
                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
               
              </div>
            </div>
          </div>
        </div>
  </div>

    @endsection