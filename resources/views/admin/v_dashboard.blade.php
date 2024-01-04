@section('title')
Dashboard
@endsection
@extends('admin/layouts/temp')
@section('main')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, 
                   @if (Str::length(Auth::guard('sadmin')->user()) > 0)
                       {{ Auth::guard('sadmin')->user()->nama }} 
                   @elseif (Str::length(Auth::guard('admin')->user()) > 0)
                       {{ Auth::guard('admin')->user()->nama_admin }} 
                    @endif
                    !</h3>
                </div>
                <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Jum'at (25 Mar 2022)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="{{ asset('sources/images/dashboard/people.svg') }}" alt="people">
                  <div class="weather-info">
                    {{-- <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Subang</h4>
                        <h6 class="font-weight-normal">Jawa</h6>
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Data Siswa</p>
                      <p class="fs-30 mb-2">{{ $Jsiswa }}</p>
                      <p>Siswa</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Data Kelas</p>
                      <p class="fs-30 mb-2">{{ $Jkelas }}</p>
                      <p>Kelas</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Data Guru</p>
                      <p class="fs-30 mb-2">{{ $Jguru }}</p>
                      <p>Guru</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Data Mata Pelajaran</p>
                      <p class="fs-30 mb-2">{{ $Jpelajaran }}</p>
                      <p>Mata Pelajaran</p>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                @if (Str::length(Auth::guard('sadmin')->user()) > 0)
                @if (Auth::guard('sadmin')->user()->level = "super")
                  <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-lima">
                    <div class="card-body">
                      <p class="mb-4">Data Admin</p>
                      <p class="fs-30 mb-2">{{ $Jadmin }}</p>
                      <p>Admin</p>
                    </div>
                  </div>
                </div>
              @endif
              @endif
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-enam">
                    <div class="card-body">
                      <p class="mb-4">Data Jadwal</p>
                      <p class="fs-30 mb-2">0</p>
                      <p>Jadwal</p>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
@endsection
    