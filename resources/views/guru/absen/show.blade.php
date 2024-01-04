@section('title')
Absensi Siswa
@endsection
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
                <h3>Absensi Siswa</h3>
                <br>
                <table>
                  <tr>
                      <td width="50%">Nama Kelas</td>
                      <td width="15%">:</td>
                      <td>{{ $jadwal->kelas->nama_kelas }}</td>
                  </tr>
                  <tr>
                      <td>Mata Pelajaran</td>
                      <td>:</td>
                      <td>{{ $jadwal->pelajaran->nama_pelajaran }}</td>
                  </tr>
                  <tr>
                      <td>Pengajar</td>
                      <td>:</td>
                      <td>{{ $jadwal->guru->nama_guru }}</td>
                  </tr>
                  <tr>
                      <td>Waktu</td>
                      <td>:</td>
                      <td>{{ $jadwal->jampel->jam_mulai }} - {{ $jadwal->jampel->jam_selesai }}</td>
                  </tr>
              </table>
              <br>

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
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="30px">No</th>
                    <th style="display: none">Id</th>
                    <th style="display: none">pelajaran_id</th>
                    <th style="display: none">kelas_id</th>
                    <th width="150px">NIS</th>
                    <th>Nama Siswa</th>
                    <th width="150px" style="text-align: center">Kelas</th>
                    <th width="200px" style="text-align: center">Absen</th>
                  </tr>
                  </thead>
                  <div class="text-danger">
                  @error('keterangan')
                  {{ $message}}
                  @enderror
                  </div>
                  <tbody>
                    @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="display: none"><input type="text" name="siswa_id[]" value="{{ $data->id }}"></td>
                        <td style="display: none"><input type="text" name="pelajaran_id[]" value="{{ $jadwal->pelajaran_id }}"></td>
                        <td style="display: none"><input type="text" value="{{ $data->kelas->id }}" name="kelas_id[]"></td>
                        <td class="nis">{{ $data->nis }}</td>
                        <td class="nama">{{ $data->nama }}</td>
                        <td class="kelas" style="text-align: center">{{ $data->kelas->nama_kelas }}</td>
                    <td style="text-align: center">
                      <input type="checkbox" name="keterangan[]" value="Hadir" class="hadir">Hadir
                      <input type="checkbox" name="keterangan[]" value="Sakit" class="keterangan">Sakit
                      <input type="checkbox" name="keterangan[]" value="Izin" class="keterangan">Izin
                      <input type="checkbox" name="keterangan[]" value="Alpa" class="keterangan">Alpa
                      {{-- <button id="hadir" class="btn btn-success" style="border-radius: 5px; border:0; font-size:13px; padding:10px" onclick="hadir()">Hadir</button>
                      <button id="sakit" class="btn btn-info" style="border-radius: 5px; border:0; font-size:13px; padding:10px" onclick="sakit()">Sakit</button>
                      <button id="izin" class="btn btn-warning" style="border-radius: 5px;  border:0; color:white; :13px; padding:10px" onclick="izin()">Izin</button>
                      <button id="alpa" class="btn btn-danger" style="border-radius: 5px;  border:0; font-size:13px; padding:10px" onclick="alpa()">Alpa</button> --}}
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <br>
                <div class="mt-1" style="margin-left: 750px">
                  <input type="checkbox" class="hadir-semua"  id="selectAll">Hadir Semua
                  <button type="submit" class="btn btn-sm btn-success me-2 mb-2">
                      <i class="btn-icon-prepend" data-feather="link"></i>
                      Simpan Absen
                  </button>
              </div>
              </form>
              </div>
          </div>
          
      
</div>
  </div>
</div>
@endsection
@section('js')
    {{-- <!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('template')}}/dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "autoWidth": false,
      "responsive": true,
    });
    var dt = $('#example1').DataTable();
    dt.column(1).visible(false);
    dt.column(2).visible(false);

  });

      $("#selectAll").change(function() {
        $(".hadir").prop("checked", $(this).prop("checked"))
      })

      $(".hadir").change(function() {
        if($(this).prop("checked")==false){
          $("#selectAll").prop("checked", false)
        }

        if($(".hadir:checked").length == $(".hadir").length){
          $("#selectAll").prop("checked", true)
        }
      })

//   $(function() { 
//     $("#selectAll").click(function(){
//       if ( (this).checked == true ){
//         $('.hadir').prop('checked', true);
//       } else {
//         $('.hadir').prop('checked', false);
//       }
//     });

//   });

//   var chk1 = $(".hadir");
//   var chk2 = $('#selectAll');
//   let listBoolean = [];

//   $(function() { 
//     chk1.click(function(){
//       chk1.forEach(item => {
//         $(".hadir")
//       });
// l
//       if ( (this).checked == true ){
//         .prop('checked', true);
//       } else {
//         $('#selectAll').prop('checked', false);
//       }
//     });

//   });


  //    const selectAll = document.querySelector('.hadir-semua input');
  //    const hadirCheckbox = document.querySelectorAll('.hadir input');
  //    var chk2 = $(".hadir");
  //   let listBoolean = [];

  // hadirCheckbox.forEach(item => {
  //   item.addEventListener('change', function() {
  //     hadirCheckbox.forEach(i=> {
  //       listBoolean.push(i.checked);
  //     })
  //     if (listBoolean.includes(false)) {
  //         selectAll.checked = false;
  //     } else {
  //         selectAll.checked = true;
  //     }
  //     listBoolean = []
  //   })
  // })

  // selectAll.addEventListener('change', function () {
  //   if (this.checked) {
  //     hadirCheckbox.forEach(i=> {
  //      i.checked = true;
  //     })
  //   } else {
  //     hadirCheckbox.forEach(i=> {
  //      i.checked = false;
  //     })
  //   }
  // })

    // $(function(e){
    //   $("#selectAll").click(function(){
    //     $(".hadir").prop('checked',$(this).prop('checked'));
    //   })
    // });

    // $(document).on('click', 'input[class="keterangan"]', function() {
    //   $('input[class="keterangan"]').not(this).prop('checked', false);
    // });

    // $(document).ready(function(){
    //   $("#keterangan").change(function() {
    //     var max = 2;
    //     var jml = $("#keterangan").length;
    //     if (jml > max) {
    //       $(this).prop("checked","");
    //     }
    //   });
    // });

    // var chk1 = $(".selectAll");
    // var chk2 = $("#hadir");
    //   chk1.on('change', function(){
    //   chk2.prop('checked',this.checked);
    //   });

      
</script>
    
@endsection