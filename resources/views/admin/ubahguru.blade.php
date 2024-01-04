@section('title')
Ubah Data Guru
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ubah Data Guru</h4>
      <form class="form-sample" action="/updateguru/{{ $guru->id }}" method="post">
         @csrf
        <p class="card-description">
          Isi form tambah data guru sesuai dengan format
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>NIP</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nip" value="{{ $guru->nip }}"/>
                <div class="text-danger">
                  @error('nip')
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
              <label>Nama Guru</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nama_guru" value="{{ $guru->nama_guru }}"/>
                <div class="text-danger">
                  @error('nama_guru')
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
                <label>Mata Pelajaran</label>
              <div class="col-sm-22">
                <select class="form-control select2" style="width: 100%;" name="pelajaran_id" id = "pelajaran_id">
                  <option value="{{ $guru->pelajaran_id }}" @disabled(true) @selected(true) aria-readonly="true">{{ $guru->pelajaran->nama_pelajaran }}</option>
                  @foreach ($dtg as $data)
                  <option value="{{ $data->id }}">{{ $data->nama_pelajaran }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          </div>
        </div>
          <div style="margin-left: 800px; margin-top: 10px">
            <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
            <a href="/guru"><button type="button" class="btn btn-secondary btn-rounded btn-fw" onclick="return confirm('Apakah anda yakin tidak menyimpan perubahan?')" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection