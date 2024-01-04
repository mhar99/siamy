@section('title')
Kriteria Penilaian
@endsection
@extends('guru.layouts.tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
 <div class="row">
  <div class="col-10 grid-margin" style="margin-left: 100px">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Kriteria Penilaian</h4>
        <form class="form-sample" action="/kriteria/input" method="post">
            @csrf
            <div class="row">
                <input type="text" name="id" value="{{ $guru->id }}" hidden>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col">
                    <label for="guru">Nama Guru</label>
                    <div class="col-sm-15">
                        <input type="text" id="guru" name="guru" value="{{ $guru->nama_guru }}" class="form-control" readonly>
                      <div class="text-danger">
                        @error('guru')
                        {{ $message}}
                        @enderror
                    </div>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col">
                        <label for="mapel">Mata Pelajaran</label>
                    <div class="col-sm-15">
                       <input type="text" id="mapel" name="mapel" value="{{ $guru->pelajaran->nama_pelajaran }}" class="form-control" readonly>
                      <div class="text-danger">
                        @error('mapel')
                        {{ $message}}
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
                    <label for="kkm">KKM</label>
                  <div class="col-sm-15">
                    <input type="text" onkeypress="return inputAngka(event)" maxlength="2" value="{{ $nilai->kkm }}" id="kkm" name="kkm" class="form-control" required>
                    <div class="text-danger">
                      @error('kkm')
                      {{ $message}}
                      @enderror
                  </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <div class="col">
                      <label for="predikat_a">Predikat A</label>
                  <div class="col-sm-15">
                      <textarea class="form-control" required name="predikat_a" id="predikat_a" rows="4">{{ $nilai->deskripsi_a }}</textarea>
                    <div class="text-danger">
                      @error('nama')
                      {{ $message}}
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
                      <label for="predikat_b">Predikat B</label>
                  <div class="col-sm-15">
                      <textarea class="form-control" required name="predikat_b" id="predikat_b" rows="4">{{ $nilai->deskripsi_a }}</textarea>
                    <div class="text-danger">
                      @error('nama')
                      {{ $message}}
                      @enderror
                  </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <div class="col">
                      <label for="predikat_c">Predikat C</label>
                  <div class="col-sm-15">
                      <textarea class="form-control" required name="predikat_c" id="predikat_c" rows="4">{{ $nilai->deskripsi_c }}</textarea>
                    <div class="text-danger">
                      @error('nama')
                      {{ $message}}
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
                      <label for="predikat_d">Predikat D</label>
                  <div class="col-sm-15">
                      <textarea class="form-control" required name="predikat_d" id="predikat_d" rows="4">{{ $nilai->deskripsi_d }}</textarea>
                    <div class="text-danger">
                      @error('nama')
                      {{ $message}}
                      @enderror
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            <div class="row">
            <div style="margin-left: 850px; margin-top: 10px">
            <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan</button>
            <a href="/guru/home"><button type="button" class="btn btn-secondary btn-rounded btn-fw" onclick="return confirm('Apakah anda yakin tidak menyimpan perubahan?')" style="padding: 10px 25px 10px 25px">Batal</button></a>
            </div>
            </div>
            </form>

    </div>
    </div>
  </div>
 </div>
    <!-- /.card -->
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ url('/') }}";
        });
    }); 
 </script>   
@endsection



