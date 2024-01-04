@section('title')
Data Jam Pelajaran
@endsection
@extends('admin/layouts/temp')
@section('main')
    
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3>Data Jam Pelajaran</h3>
                <p class="card-description">
                  <a href="/jampelajaran/tambahjampelajaran/"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Data</button></a>
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
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($jampel as $jampel)
                            
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $jampel->jam_mulai}}</td>
                          <td>{{ $jampel->jam_selesai}}</td>
                          <td> <a href="/jampelajaran/ubahjampelajaran/{{ $jampel->id }}"><label class="btn btn-warning" style="padding: 3%">Ubah</label></a>
                            <a href="/hapusjampelajaran/{{ $jampel->id }}"><label class="btn btn-danger" style="padding: 3%" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>
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