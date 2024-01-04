@section('title')
Data Jadwal Pelajaran
@endsection
@extends('admin/layouts/temp')
{{-- @section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
@endsection --}}
@section('main')
<div class="content-wrapper">
  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h3>Data Jadwal</h3>
                <p class="card-description">
                    <a href="/jadwal/tambah"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Jadwal</button></a>
                  </p>
                
                  @if(session()->has('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                  @endif

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="30px">No</th>
                    <th>Kelas</th>
                    <th width="200px" style="text-align: center">Lihat Jadwal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($kelas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                    <td style="text-align: center"><a href="/jadwal/show/{{$data->id}}"><label class="badge badge-primary" style="border-radius: 5px; font-size:13px; padding:10px">Pilih kelas</label></a></td>
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