@extends('guru/layouts/temp')
@section('css')
<link rel="stylesheet" href="{{asset('')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('main')
<div class="content-wrapper">
  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3>Absensi Siswa</h3>
              {{-- <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pilih kelas
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                  @foreach ($kelas as $item)
                  <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                      
                  @endforeach
                </div>
              </div> --}}
              <div class="row">
                <div class="col-md-4">
              <select id="d-kelas" class="form-control filter">
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                @endforeach
              </select>
              </div>
              </div>
              <br>
              @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif

              <div class="table-responsive">
                  <table class="table" id="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Siswa</th>
                          {{-- <th>Nama</th>
                          <th>Tempat Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Aksi</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                          {{-- @foreach ($siswas as $siswa)
                          <tr>
                            
                            <td>{{ $siswa->nama }}</td>
                            <td> <a href="/siswa/ubahsiswa/{{ $siswa->id }}"><label class="badge badge-warning">Ubah</label></a>
                              <a href="/hapussiswa/{{ $siswa->id }}"><label class="badge badge-danger" onclick="return confirm('Yakin menghapus data?')">Hapus</label></a>
                          </td>
                          </tr>
                          @endforeach --}}
                      </tbody>
                  </table>
               
              </div>
            </div>
          </div>
        </div>
  </div>

    @endsection

@section('js')
<script src="{{ asset('') }}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
   let data = []

   let kelas = $("#d-kelas").val()
   
   const table =  $("#table").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "pageLength": 5,
      "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
      "bFilter": true,
      "bInfo": true,
      "processing":true,
      "bServerSide": true,
      "order": [[ 1, "asc" ]],
      "ajax":{
         url:"{{url('absensi')}}",
         type:"POST",
         data:function(d){
          d._token = "{{csrf_token()}}"
          d.kelas = kelas;
          return d
         }
      },

    columns:[
      {
      "render": function(data, type, row, meta){
        return row.id
      }
    },
    {
      "render": function(data, type, row, meta){
        return row.nama
      }
    }
  ]
      
    });

   function ambil_siswa(){
     const url = "{{ url('data_absen') }}"
     $.ajax({
       url,
       success:function(ambil_siswa){
         console.log(ambil_siswa)
         let tampilan = '';
         $("#table tbody").children().remove()
         for(let i=0;i<ambil_siswa.length;i++){
           tampilan+=`
           <tr>
            <td>${ambil_siswa[i].id}</td>
              <td>${ambil_siswa[i].nama}</td>
           </tr>
           `
         }
         $("#table tbody").append(tampilan)
       },
       error:function(e){
         console.log(e)
         alert("Terjadi Kesalahan")
       }
     })
   }

  // ambil_siswa()

  $(".filter").on('change',function(){
    organisasi = $("#d-kelas").val()
    table.ajax.reload(null,false)
  })
</script>
@endsection