@section('title')
Tambah Tahun Pelajaran
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Tahun Pelajaran</h4>
      <form class="form-sample" action="/tahunajaran" method="post">
         @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Tahun Ajaran</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="tahun_ajaran" />
                <div class="text-danger">
                  @error('tahun_ajaran')
                  {{ $message}}
                  @enderror
              </div>
              </div>
            </div>
            </div>
          </div>
        <div class="row">
          <div style="margin-left: 850px; margin-top: 10px">
            <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
            <a href="/tahunajaran"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection