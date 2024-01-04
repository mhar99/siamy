@section('title')
Ubah Data Admin
@endsection
@extends('admin/layouts/tempcrud')
@section('isi')
<div class="content-wrapper" style="width: 1350px">
  <div class="row">
<div class="col-10 grid-margin" style="margin-left: 100px">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ubah Data Admin</h4>
      <form class="form-sample" action="/updateadmin/{{ $admin->id }}" method="post">
         @csrf
        <p class="card-description">
          Isi form tambah data admin sesuai dengan format
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <div class="col">
              <label>Nama Admin</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="nama_admin" value="{{ $admin->nama_admin }}"/>
                <div class="text-danger">
                  @error('nama_admin')
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
              <label>Username</label>
              <div class="col-sm-15">
                <input type="text" class="form-control" name="username" value="{{ $admin->username }}"/>
                <div class="text-danger">
                  @error('username')
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
              <label>Password</label>
              <div class="col-sm-22">
                <input type="text" class="form-control" name="password" value="{{ $admin->password }}" />
                <div class="text-danger">
                  @error('password')
                  {{ $message}}
                  @enderror
              </div>
              </div>
              </div>
            </div>
          </div>
          <div style="margin-left: 850px; margin-top: 10px">
            <button type="submit" class="btn btn-primary btn-rounded btn-fw" style="padding: 10px 20px 10px 20px">Simpan</button>
            <a href="/admin"><button type="button" class="btn btn-secondary btn-rounded btn-fw" style="padding: 10px 25px 10px 25px" onclick="return confirm('Apakah anda yakin tidak menyimpan perubahan?')">Batal</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

    @endsection