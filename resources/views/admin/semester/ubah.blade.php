@section('title')
Edit Semester
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Semester</h4>
      <form class="form-sample" action="/updatesemester/{{ $semester->id }}" method="post">
         @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Tahun Ajaran</label>
              <div class="col-sm-15">
                <select class="form-control select2" style="width: 100%;" name="tahun_ajaran_id" id = "tahun_ajaran_id">
                    <option value="{{ $semester->tahun_ajaran_id }}" aria-readonly="true" @selected(true)>{{ $semester->tahunAjaran->tahun_ajaran }}</option>
                    @foreach ($tahun as $tahun)
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
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Semester</label>
              <div class="col-sm-15">
                <select class="form-control select2" style="width: 100%;" name="nama_semester" id = "nama_semester">
                    <option value="{{ $semester->id }}" aria-readonly="true" @selected(true)>{{ $semester->nama_semester }}</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
                <div class="text-danger">
                  @error('nama_semester')
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
            <a href="/semester"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection