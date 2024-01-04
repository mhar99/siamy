@section('title')
Data Kelas
@endsection
@extends('admin/layouts/temp')
@section('main')    
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3>Data Kelas</h3>
                <p class="card-description">
                  <a href="/kelas/tambahkelas"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Data</button></a>
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
                        <th>Nama Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Tahun Ajaran</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $k)
                            
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $k->nama_kelas }}</td>
                          <td>{{ $k->jumlah_siswa }}</td>
                          <td>{{ $k->tahunAjaran->tahun_ajaran }}</td>
                          <td>{{ $k->guru->nama_guru }}</td>
                          <td> <a href="/kelas/detailkelas/{{ $k->id }}"><label class="btn btn-success" style="padding: 3%">Detail</label></a>
                            <a href="/kelas/ubahkelas/{{ $k->id }}"><label class="btn btn-warning" style="padding: 3%">Ubah</label></a>
                            <a href="/hapuskelas/{{ $k->id }}"><label class="btn btn-danger" style="padding: 3%" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>
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