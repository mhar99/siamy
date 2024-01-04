@section('title')
Data Guru
@endsection
@extends('admin/layouts/temp')
@section('main')
    
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3>Data Guru</h3>
                <p class="card-description">
                  <a href="/guru/tambahguru"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Data</button></a>
                </p>

                
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                  <table class="table table-hover"  id="example1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th style="text-align: center">Aksi</th>
                        
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $guru)
                            
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $guru->nip }}</td>
                          <td>{{ $guru->nama_guru }}</td>
                          <td> {{$guru->pelajaran->nama_pelajaran}}</td>
                         
                          <td style="text-align: center"> 
                            <a href="/guru/detailguru/{{ $guru->id }}"><label class="btn btn-success" style="padding: 3%">Detail</label></a>
                            <a href="/guru/ubahguru/{{ $guru->id }}"><label class="btn btn-warning" style="padding: 3%">Ubah</label></a>
                            <a href="/hapusguru/{{ $guru->id }}"><label class="btn btn-danger" style="padding: 3%" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>
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


























    