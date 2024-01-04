@section('title')
Data Nilai Siswa
@endsection
@extends('guru/layouts/temp')
@section('main')
    
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3>Data Nilai Siswa</h3>
                <p class="card-description">
                  <a href="/pelajaran/tambahpelajaran"><button type="button" class="btn btn-primary btn-rounded btn-fw">Tambah Data</button></a>
                </p>
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="ctr" rowspan="2">No.</th>
                            <th rowspan="2">Nama Siswa</th>
                            <th class="ctr" colspan="3">Pengetahuan</th>
                            <th class="ctr" colspan="3">Keterampilan</th>
                            <th class="ctr" rowspan="2" width="10px">Aksi</th>
                        </tr>
                        <tr>
                            <th class="ctr">Nilai</th>
                            <th class="ctr">Predikat</th>
                            <th class="ctr">Deskripsi</th>
                            <th class="ctr">Nilai</th>
                            <th class="ctr">Predikat</th>
                            <th class="ctr">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post" id="formRapot">
                            @csrf
                            {{-- <input type="hidden" name="guru_id" value="{{$guru->id}}">
                            <input type="hidden" name="kelas_id" value="{{$kelas->id}}"> --}}
                            @foreach ($siswa as $data)
                                {{-- <input type="hidden" name="siswa_id" value="{{$data->id}}"> --}}
                                <tr>
                                    <td class="ctr">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    {{-- @if ($data->nilai($data->id)) --}}
                                        <td class="ctr">
                                            <input type="hidden" class="rapot_{{$data->id}}" value="{{ $data->nilai($data->id)->id }}">
                                            <div class="text-center">{{ $data->nilai($data->id)->nilaip }}</div>
                                        </td>
                                        <td class="ctr">
                                            <div class="text-center">{{ $data->nilai($data->id)->predikatp }}</div>
                                        </td>
                                        <td class="ctr">
                                            <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled>{{ $data->nilai($data->id)->deskripsip }}</textarea>
                                        </td>
                                        {{-- @if ($data->nilai($data->id)->nilaip && $data->nilai($data->id)->nilaik) --}}
                                            <td class="ctr">
                                                <div class="ka_{{$data->id}} text-center">{{ $data->nilai($data->id)->nilaik }}</div> 
                                            </td>
                                            <td class="ctr">
                                                <div class="kp_{{$data->id}} text-center">{{ $data->nilai($data->id)->predikatk }}</div>
                                            </td>
                                            <td class="ctr">
                                                <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled>{{ $data->nilai($data->id)->deskripsik }}</textarea>
                                            </td>
                                            <td class="ctr" style="width: 10%">
                                                <a href="/nilai/ubah/{{ $data->id }}"><label class="btn btn-warning" style="padding: 10%">Ubah</label></a>
                                            </td>
                                        {{-- @else --}}
                                            {{-- <td class="ctr">
                                                <input type="text" name="nilai" maxlength="2" onkeypress="return inputAngka(event)" class="form-control text-center nilai_{{$data->id}}" data-ids="{{$data->id}}" autofocus autocomplete="off">
                                                <div class="knilai_{{$data->id}} text-center"></div>
                                            </td>
                                            <td class="ctr">
                                                <input type="text" name="predikat" class="form-control text-center predikat_{{$data->id}}" disabled>
                                                <div class="kpredikat_{{$data->id}} text-center"></div>
                                            </td>
                                            <td class="ctr">
                                                <textarea class="form-control swal2-textarea textarea-rapot deskripsi_{{$data->id}}" cols="50" rows="5" disabled></textarea>
                                            </td>
                                            <td class="ctr sub_{{$data->id}}">
                                                <button type="button" id="submit-{{$data->id}}" class="btn btn-default btn_click" data-id="{{$data->id}}"><i class="nav-icon fas fa-save"></i></button>
                                            </td> --}}
                                        {{-- @endif --}}
                                    {{-- @else
                                        <td class="ctr">
                                            <div class="text-center"></div>
                                        </td>
                                        <td class="ctr">
                                            <div class="text-center"></div>
                                        </td>
                                        <td class="ctr">
                                            <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled></textarea>
                                        </td>
                                        <td class="ctr">
                                            <input type="text" name="nilai" maxlength="2" onkeypress="return inputAngka(event)" class="form-control text-center nilai_{{$data->id}}" data-ids="{{$data->id}}" autofocus autocomplete="off">
                                            <div class="knilai_{{$data->id}} text-center"></div>
                                        </td>
                                        <td class="ctr">
                                            <input type="text" name="predikat" class="form-control text-center" disabled>
                                        </td>
                                        <td class="ctr">
                                            <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled></textarea>
                                        </td>
                                        <td class="ctr">
                                            <i class="fas fa-exclamation-triangle" style="font-weight:bold;"></i>
                                        </td>
                                    @endif --}}
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    @endsection
    @section('js')
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
    @endsection