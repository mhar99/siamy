@section('title')
Ubah Jam Pelajaran
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ubah Jam Pelajaran</h4>
      <form class="form-sample" action="/updatejam/{{ $jampel->id }}" method="post">
         @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Jam Mulai</label>
              <div class="col-sm-15">
                <input type="time" class="form-control" name="jam_mulai" value="{{ $jampel->jam_mulai }}"/>
                <div class="text-danger">
                  @error('jam_mulai')
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
              <label>Jam Mulai</label>
              <div class="col-sm-15">
                <input type="time" class="form-control" name="jam_selesai" value="{{ $jampel->jam_selesai }}" />
                <div class="text-danger">
                  @error('jam_selesai')
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
            <a href="/jampelajaran"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection