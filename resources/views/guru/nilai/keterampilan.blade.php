@extends('guru/layouts/temp')
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
                <h3>Nilai Siswa</h3>
                @if(session()->has('bukan'))
                <div class="alert alert-danger" role="alert">
                  {{ session('bukan') }}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="30px">No</th>
                    <th>Kelas</th>
                    <th width="200px" style="text-align: center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($kelas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                    <td style="text-align: center"><a href="/keterampilan/input/{{ $data->id }}"><label class="btn btn-success" style="border-radius: 5px; font-size:13px; padding:10px">Pilih kelas</label></a></td>
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
@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection