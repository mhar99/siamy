@section('title')
Kelola Semester
@endsection
@extends('admin/layouts/temp')
@section('main')
    
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3>Kelola Semester</h3>
                <p class="card-description">
                  <a href="/semester/tambahsemester/"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Data</button></a>
                </p>

                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
                @endif
                @if(session()->has('danger'))
                <div class="alert alert-danger" role="alert">
                  {{ session('danger') }}
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table table-hover" id="example1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th style="text-align: center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester as $semester)
                            
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $semester->tahunAjaran->tahun_ajaran}}</td>
                          <td>{{ $semester->nama_semester }}</td>
                          <td>{{ $semester->status }}</td>
                          <td style="text-align: center">
                            @if ($semester->status == 'aktif')
                            <a href="/semester/ubahstatus/non-aktif/{{ $semester->id }}"><label class="btn btn-primary" style="padding: 3%">Non-aktifkan</label></a>
                            <a href="/semester/ubahsemester/{{ $semester->id }}"><label class="btn btn-warning" style="padding: 3%">Ubah</label></a>
                            <a href="/hapussemester/{{ $semester->id }}"><label class="btn btn-danger" style="padding: 3%" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>    
                            @else
                            <a href="/semester/ubahstatus/aktif/{{ $semester->id }}"><label class="btn btn-primary" style="padding: 3%">Aktifkan</label></a>
                            <a href="/semester/ubahsemester/{{ $semester->id }}"><label class="btn btn-warning" style="padding: 3%">Ubah</label></a>
                            <a href="/hapussemester/{{ $semester->id }}"><label class="btn btn-danger" style="padding: 3%" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>
                            @endif
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