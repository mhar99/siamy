@section('title')
Pengaturan Akun
@endsection
@extends('guru/layouts/tempcrud')
@section('css')
  <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}">
@endsection
@section('isi')
<div class="content-wrapper" style="width: 1350px">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          
          <!-- /.col -->
          <div class="col-md-9" style="margin-left: 160px">
            <div class="card">
              <!-- Profile Image -->
              <div style="margin-top: 20px; margin-left: 10px">
              <h3>Pengaturan Akun</h3>
              <hr>
              </div>
             <div class="card card-primary card-outline">
               <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle fotoProfil" style="width: 128px; border-radius: 50%"
                       src="{{ Auth::guard('guru')->user()->foto }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center" style="margin-top: 10px">{{ Auth::guard('guru')->user()->nama_guru }}</h3>

                <p class="text-muted text-center">Guru {{ Auth::guard('guru')->user()->pelajaran->nama_pelajaran }}</p>
               
                <input type="file" name="guru_image" id="foto-guru" style="opacity: 0;height:1px;display:none">
                <a href="#" class="btn btn-primary btn-ganti" id="ubahFoto" style="margin-left: 380px; padding: 10px 27px 10px 27px;"><b>Ubah Foto</b></a>
                
                <div class="card-body" style=" margin-top: 20px;">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Informasi Personal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ganti Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content" style="border: none">
                  <div class="tab-pane active" id="timeline">
                    @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                    @endif
              
                    <form class="form-horizontal" method="POST" action="{{ route('guruUpdateProfil') }}" id="formProfil">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::guard('guru')->user()->nip }}" name="nip">
                          <span class="text-danger error-text nip_error"></span>
                          <div class="text-danger">
                            @error('nip')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Nama Guru" value="{{ Auth::guard('guru')->user()->nama_guru }}" name="nama_guru">
                          <span class="text-danger error-text nama_error"></span>
                          <div class="text-danger">
                            @error('nama_guru')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Guru</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name" value=" {{ Auth::guard('guru')->user()->pelajaran->nama_pelajaran }}" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" style="padding: 10px 20px 10px 20px">Simpan</button>
                          <a href="/guru/home" class="btn btn-secondary" style="padding: 10px 20px 10px 20px">Kembali</a>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="settings">

                    @if(session()->has('berhasil'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('berhasil') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('adminChangePassword') }}"  id="changePasswordAdminForm">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="oldpassword" placeholder="Masukan password saat ini" name="oldpassword">
                          <span class="text-danger error-text oldpassword_error"></span>
                          <div class="text-danger">
                            @error('oldpasswword')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="newpassword" placeholder="Masukan password baru" name="newpassword">
                          <span class="text-danger error-text newpassword_error"></span>
                          <div class="text-danger">
                            @error('newpassword')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-3 col-form-label">Konfirmasi Password baru</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="cnewpassword" placeholder="Masukan kembali password baru" name="cnewpassword">
                          <span class="text-danger error-text cnewpassword_error"></span>
                          <div class="text-danger">
                            @error('cnewpassword')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-8">
                          <button type="submit" class="btn btn-primary" style="padding: 10px 20px 10px 20px">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('js')
  <script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script>
  {{-- <script src="{{ asset('ijaboCropTool/jquery-1.7.1.min.js') }}"></script> --}}
  <script>
     $(".btn-ganti").on("click", function(){
        $('#foto-guru').click();
        });

      $('#foto-guru').ijaboCropTool({
      preview : '.fotoProfil',
      setRatio:1,
      allowedExtensions: ['jpg', 'jpeg','png'],
      buttonsText:['OK','BATAL'],
      buttonsColor:['#30bf7d','#ee5155', -15],
      processUrl:'{{ route("guruPictureUpdate") }}',
      withCSRF:['_token','{{ csrf_token() }}'],
      onSuccess:function(message, element, status){
         alert(message);
      },
      onError:function(message, element, status){
        alert(message);
      }
   });
  </script>
      
  @endsection