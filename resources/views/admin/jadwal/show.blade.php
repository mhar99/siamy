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
                <h3>Jadwal Pelajaran</h3>

                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('simpanAbsen') }}" method="POST">
                  {{ csrf_field() }}
                  @if (session('error') === '')
                  <div class="mt-2 alert alert-success">
                      <i class="link-icon" data-feather="check-circle"></i> Berhasil menyimpan data!
                  </div>
                  @elseif(session('error') == 1)
                  <div class="mt-2 alert alert-danger">
                      <i class="link-icon" data-feather="alert-circle"></i> Gagal saat mencoba menyimpan data, silahkan coba kembali!
                  </div>
                   @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Jadwal</th>
                    <th>Hari</th>
                    <th>Pelajaran</th>
                    <th>Pengajar</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($jadwal as $data)
                    <tr>
                        <td>{{ $data->kode_jadwal }}</td>
                        <td>{{ $data->hari->nama_hari }}</td>
                        <td>{{ $data->pelajaran->nama_pelajaran }}</td>
                        <td>{{ $data->guru->nama_guru }}</td>
                        <td>{{ $data->jampel->jam_mulai }}</td>
                        <td>{{ $data->jampel->jam_selesai }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </form>
              </div>
          </div>
          
      
</div>
  </div>
</div>
@endsection
@section('js')
<script>
  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "lengthChange": false,
  //     "searching": true,
  //     "ordering": false,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  //   // var dt = $('#example1').DataTable();
  //   // dt.column(1).visible(false);

  // });

  

    var chk1 = $(".selectAll");
    var chk2 = $("#hadir");
      chk1.on('change', function(){
      chk2.prop('checked',this.checked);
      });

      
</script>
    
@endsection