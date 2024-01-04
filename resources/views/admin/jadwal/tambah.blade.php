@section('title')
Tambah Jadwal Pelajaran
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Jadwal Pelajaran</h4>
 
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <form class="form-sample" action="/jadwal/tambah" method="post">
        @csrf
       {{-- <p class="card-description">
         Isi form tambah data Guru sesuai dengan format
       </p> --}}
       <div class="row">
         <div class="col-md-6">
           <div class="form-group row">
             <div class="col">
             <label>Kode Jadwal</label>
             <div class="col-sm-15">
               <input type="text" name="kode_jadwal" class="form-control" value="{{ $kode_jadwal }}" readonly/>
             </div>
           </div>
           </div>
         </div>
           <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Hari</label>
              <div class="col-sm-15">
               <select id="hari_id" name="hari_id" class="form-control @error('hari_id') is-invalid @enderror select2bs4" placeholder="-- Pilih Hari --">
                 <option value="" @selected(true) @disabled(true)>-- Pilih Hari --</option>
                 @foreach ($hari as $data)
                     <option value="{{ $data->id }}">{{ $data->nama_hari }}</option>
                 @endforeach
             </select>
             <div class="text-danger">
              @error('hari_id')
                  {{ $message }}
              @enderror
             </div>
              </div>
              </div>
            </div>
          </div>
         </div>
       <div class="row">
          <div class="col-md-6">
           <div class="form-group row">
             <div class="col">
             <label>Mata Pelajaran</label>
             <div class="col-sm-15">
              <select id="pelajaran_id" name="pelajaran_id" class="form-control @error('pelajaran_id') is-invalid @enderror select2bs4" placeholder="-- Pilih Hari --">
                <option value="" @selected(true) @disabled(true)>-- Pilih Pelajaran --</option>
                @foreach ($pelajaran as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_pelajaran }}</option>
                @endforeach
            </select>
             </div>
             </div>
           </div>
         </div>
         <div class="col-md-6">
          <div class="form-group row">
            <div class="col">
              <label>Pengajar</label>
              <div class="col-sm-15">
               <select id="guru_id" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror select2bs4">
                 <option value="" @selected(true) @disabled(true)>-- Pilih Guru--</option>
                 {{-- @foreach ($guru as $data)
                     <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                 @endforeach --}}
             </select>
             <div class="text-danger">
              @error('guru_id')
                  {{ $message }}
              @enderror
             </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col">
              <label>Kelas</label>
              <div class="col-sm-15">
               <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                 <option value=""  @selected(true) @disabled(true)>-- Pilih Kelas --</option>
                 @foreach ($kelas as $data)
                     <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                 @endforeach
             </select>
             <div class="text-danger">
              @error('kelas_id')
                  {{ $message }}
              @enderror
             </div>
              </div>
          </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col">
              <label>Waktu</label>
              <div class="col-sm-15">
                <select id="jam_id" name="jampel_id" class="form-control @error('jampel_id') is-invalid @enderror select2bs4">
                  <option value=""  @selected(true) @disabled(true)>-- Pilih jam pelajaran --</option>
                  @foreach ($jam as $data)
                      <option value="{{ $data->id }}">{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</option>
                  @endforeach
              </select>
                <div class="text-danger">
                  @error('jampel_id')
                      {{ $message }}
                  @enderror
                 </div>
              </div>
          </div>
          </div>
        </div>
      </div>
         <div style="margin-left: 800px; margin-top: 0px">
           <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
           <a href="/jadwal"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
         </div>
       </div>
     </form>


    </div>
  </div>
</div>
  </div>
</div>

    @endsection
    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
        $('#pelajaran_id').on('change', function() {
           var pelajaranID = $(this).val();
           if(pelajaranID) {
               $.ajax({
                   url: '/getguru/'+pelajaranID,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#guru_id').empty();
                        $('#guru_id').append('<option hidden selected>-- Pilih Guru --</option>'); 
                        $.each(data, function(key, guru){
                            $('select[name="guru_id"]').append('<option value="'+ guru.id +'">' + guru.nama_guru+ '</option>');
                        });
                    }else{
                        $('#guru_id').empty();
                    }
                 }
               });
           }else{
             $('#guru_id').empty();
           }
        });
        });
    </script>
    @endsection