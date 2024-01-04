@section('title')
Home
@endsection
@extends('guru/layouts/temp')
@section('main')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, {{Auth::guard('guru')->user()->nama_guru  }}!</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2">
                     <i class="mdi mdi-calendar"></i> {{ $tanggal }}
                    </button>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
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
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Jadwal mengajar</h3>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Hari</th>
                        <th style="text-align: center">Waktu</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th style="text-align: center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jadwal as $data)
                       @if ($data->guru_id == Auth::guard('guru')->user()->id)
                      <tr>
                        <td>{{ $data->hari->nama_hari }}</td>
                        <td>{{ $data->jampel->jam_mulai }} - {{ $data->jampel->jam_selesai }}</td>
                        <td>{{ $data->pelajaran->nama_pelajaran }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                       <td style="text-align: center"><a href="/absen/show/{{$data->kelas->id}}"><label class="badge badge-primary" style="border-radius: 5px; font-size:13px; padding:10px">Absen Siswa</label></a></td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
            </div>
          </div>
@endsection