@section('title')
Tambah Data Siswa
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Data Siswa</h4>
      <form class="form-sample" action="/siswa" method="post">
         @csrf
        <p class="card-description">
          Isi form tambah data siswa sesuai dengan format
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>NIS</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nis" placeholder="cnth: 180XXXXXXX" />
                <div class="text-danger">
                  @error('nis')
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
              <label>Nama Siswa</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nama" placeholder="Nama Siswa" />
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
              <label>Tempat Tanggal Lahir</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="ttl" placeholder="cnth: Subang, 09 September 2011"/>
                <div class="text-danger">
                  @error('ttl')
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
              <label>Password</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="password" placeholder="cnth: 090911"/>
                <div class="text-danger">
                  @error('password')
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
              <label>Alamat</label>
              <div class="col-sm-15">
                <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
                <div class="text-danger">
                  @error('alamat')
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
                  {{ $message}}
                  @enderror
              </div>
              </div>
            </div>
          </div>
          </div>
          <div style="margin-left: 80%; margin-top: 10px">
            <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
            <a href="/siswa"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection