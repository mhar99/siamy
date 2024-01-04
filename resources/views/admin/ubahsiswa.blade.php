@section('title')
Ubah Data Siswa
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ubah Data Siswa</h4>
      <form class="form-sample" action="/ubah/{{$siswa->id}}" method="post">
         @csrf
        <p class="card-description">
          Ubah data siswa sesuai dengan format
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>NIS</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nis" value="{{ $siswa->nis }}" />
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
                <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}" />
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
                <input type="text" class="form-control" name="ttl" value="{{ $siswa->ttl }}" />
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
              <label>Kelas</label>
              <div class="col-sm-15">
                <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                  <option value="{{ $siswa->kelas_id }}">{{$siswa->kelas->nama_kelas}}</option>
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
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <div class="col">
                <label>Alamat</label>
              <div class="col-sm-22">
                <input type="text" class="form-control" name="alamat" value="{{ $siswa->alamat }}">
              </div>
            </div>
          </div>
          </div>
        </div>
          <div style="margin-left: 80%; margin-top: 10px">
            <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
            <a href="/siswa"><button type="button" class="btn btn-secondary btn-rounded btn-fw" onclick="return confirm('Apakah anda yakin tidak menyimpan perubahan?')" style="padding: 10px 25px 10px 25px">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection