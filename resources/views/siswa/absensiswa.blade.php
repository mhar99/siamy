@section('title')
Laporan Absensi
@endsection
@extends('siswa/layouts/temp')
@section('main')
<div class="content-wrapper">
  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <h3>Laporan Absensi {{ Auth::guard('siswa')->user()->nama }}</h3>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th width="30px">Waktu Absen</th>
                      <th style="text-align: center">Mata Pelajaran</th>
                      <th  style="text-align: center">Keterangan Absen</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($absen as $data)
                      @if ($data->siswa->id == Auth::guard('siswa')->user()->id)
                      <tr>
                          <td>{{ $data->created_at }}</td>
                          <td>{{ $data->pelajaran->nama_pelajaran }}</td>
                          <td>{{ $data->keterangan }}</td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                  </table>
                  {{-- <a href="/siswa/home"><button type="button" class="btn btn-secondary" style="padding: 10px 25px 10px 25px">Kembali</button></a> --}}
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