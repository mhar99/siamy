@section('title')
Pilih Semester
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Pilih Tahun Ajaran & Semeseter</h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Tahun Ajaran</label>
              <div class="col-sm-15">
                <select class="form-control select2" style="width: 100%;" name="tahun_ajaran_id" id = "tahun_ajaran_id">
                    <option value="" aria-readonly="true">-- Pilih Tahun Ajaran --</option>
                    @foreach ($tahunA as $thn)
                    <option value="{{ $thn->id }}">{{ $thn->tahun_ajaran }}</option>
                    @endforeach
                  </select>
                <div class="text-danger">
                  @error('nama_pelajaran')
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
                <label>Semester</label>
                <div class="col-sm-15">
                  <select class="form-control select2" style="width: 100%;" name="tahun_ajaran_id" id = "tahun_ajaran_id">
                      <option value="" aria-readonly="true">-- Pilih Semester --</option>
                      @foreach ($tahunA as $thn)
                      <option value="{{ $thn->id }}">{{ $thn->tahun_ajaran }}</option>
                      @endforeach
                    </select>
                  <div class="text-danger">
                    @error('nama_pelajaran')
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
            <a href="/pelajaran"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection