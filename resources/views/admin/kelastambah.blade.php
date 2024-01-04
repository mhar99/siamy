@section('title')
Tambah Data Kelas
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Data Kelas</h4>
      <form class="form-sample" action="/kelas" method="post">
         @csrf
        <p class="card-description">
          Isi form tambah data kelas sesuai dengan format
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Nama Kelas</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nama_kelas" />
                <div class="text-danger">
                  @error('nama_kelas')
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
              <label>Jumlah Siswa</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="jumlah_siswa" />
                <div class="text-danger">
                  @error('jumlah_siswa')
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
              <label>Wali kelas</label>
              <div class="col-sm-15">
                <select class="form-control select2" style="width: 100%;" name="guru_id" id = "guru_id">
                  <option value="" aria-readonly="true" @disabled(true) @selected(true)>-- Pilih Walikelas --</option>
                  @foreach ($dtg as $guru)
                  <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                  @endforeach
                </select>
                <div class="text-danger">
                  @error('guru_id')
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
              <label>Tahun Ajaran</label>
              <div class="col-sm-15">
                <select class="form-control select2" style="width: 100%;" name="tahun_ajaran_id" id = "tahun_ajaran_id">
                  <option value="" aria-readonly="true" @disabled(true) @selected(true)>-- Pilih Tahun Ajaran --</option>
                  @foreach ($thn as $tahun)
                  <option value="{{ $tahun->id }}">{{ $tahun->tahun_ajaran }}</option>
                  @endforeach
                </select>
                <div class="text-danger">
                  @error('tahun_ajaran_id')
                  {{ $message}}
                  @enderror
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div style="margin-left: 850px; margin-top: 10px">
            <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
            <a href="/kelas"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection