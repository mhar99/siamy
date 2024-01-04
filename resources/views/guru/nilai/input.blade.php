@section('title')
Input Nilai Siswa
@endsection
@extends('guru.layouts.tempcrud')
@section('isi')
    <!-- general form elements -->
    <div class="content-wrapper" style="width: 1350px">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h3>Nilai Siswa</h3>
                      <div class="col-md-12">
                        <table style="margin-top: 50px; margin-left:20px; display:inline">
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td>{{ $guru->pelajaran->nama_pelajaran }}</td>
                            </tr>
                            <tr>
                                <td>Guru Mata Pelajaran</td>
                                <td>:</td>
                                <td>{{ $guru->nama_guru }}</td>
                            </tr>
                            @php
                                $bulan = date('m');
                                $tahun = date('Y');
                            @endphp
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>
                                    @if ($bulan > 6)
                                        {{ 'Semester Ganjil' }}
                                    @else
                                        {{ 'Semester Genap' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>:</td>
                                <td>
                                    @if ($bulan > 6)
                                        {{ $tahun }}/{{ $tahun+1 }}
                                    @else
                                        {{ $tahun-1 }}/{{ $tahun }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <table style="margin-top: 25px; margin-left:680px; display:inline">
                            <tr>
                                <td>Nama Kelas</td>
                                <td>:</td>
                                <td>{{ $kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td>Wali Kelas</td>
                                <td>:</td>
                                <td>{{ $kelas->guru->nama_guru }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Siswa</td>
                                <td>:</td>
                                <td>{{ $siswa->count() }}</td>
                            </tr>
                           
                        </table>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        {{-- <form action="/nilai/simpan" method="post">
                            @csrf
                        @if (session('error') === '')
                        <div class="mt-2 alert alert-success">
                            <i class="link-icon" data-feather="check-circle"></i> Berhasil menyimpan data!
                        </div>
                    @elseif(session('error') == 1)
                        <div class="mt-2 alert alert-danger">
                            <i class="link-icon" data-feather="alert-circle"></i> Gagal saat mencoba menyimpan data, silahkan coba kembali!
                        </div>
                    @endif --}}
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="ctr">No.</th>
                                <th>Nama Siswa</th>
                                <th class="ctr">Tugas</th>
                                <th class="ctr">Ulangan Harian 1</th>
                                <th class="ctr">PTS</th>
                                <th class="ctr">Ulangan Harian 2</th>
                                <th class="ctr">PAS</th>
                                <th class="ctr">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="guru_id" value="{{$guru->id}}">
                                <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                                @foreach ($siswa as $data)
                                    <input type="hidden" name="siswa_id" value="{{$data->id}}">
                                    <tr>
                                        <td class="ctr">{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $data->nama }}
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['id'])
                                                <input type="hidden" name="ulangan_id" class="ulangan_id_{{$data->id}}" value="{{ $data->ulangan($data->id)->id }}">
                                            @else
                                                <input type="hidden" name="ulangan_id" class="ulangan_id_{{$data->id}}" value="">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['tugas'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['tugas'] }}</div>
                                                <input type="hidden" name="tugas" class="tugas_{{$data->id}}" value="{{ $data->ulangan($data->id)['tugas'] }}">
                                            @else
                                                <input type="text" name="tugas" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center tugas_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulhar1'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['ulhar1'] }}</div>
                                                <input type="hidden" name="ulhar1" class="ulhar1_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulhar1'] }}">
                                            @else
                                                <input type="text" name="ulhar1" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulhar1_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uts'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['uts'] }}</div>
                                                <input type="hidden" name="uts" class="uts_{{$data->id}}" value="{{ $data->ulangan($data->id)['uts'] }}">
                                            @else
                                                <input type="text" name="uts" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uts_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulhar2'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['ulhar2'] }}</div>
                                                <input type="hidden" name="ulhar2" class="ulhar2_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulhar2'] }}">
                                            @else
                                                <input type="text" name="ulhar2" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulhar2_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uas'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['uas'] }}</div>
                                                <input type="hidden" name="uas" class="uas_{{$data->id}}" value="{{ $data->ulangan($data->id)['uas'] }}">
                                            @else
                                                <input type="text" name="uas" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uas_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr sub_{{$data->id}}">
                                            @if ($data->nilai($data->id))
                                                <i class="fas fa-check" style="font-weight:bold;"></i>
                                            @else
                                                <button type="button" id="submit-{{$data->id}}" class="btn btn-default btn_click" data-id="{{$data->id}}"><i class="nav-icon fas fa-save"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                    </div>
          </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>
@endsection
@section('js')
<script>
    $(".btn_click").click(function(){
            var id = $(this).attr('data-id');
            var tugas = $(".tugas_"+id).val();
            var ulhar1 = $(".ulhar1_"+id).val();
            var uts = $(".uts_"+id).val();
            var ulhar2 = $(".ulhar2_"+id).val();
            var uas = $(".uas_"+id).val();
            var ulangan_id = $(".ulangan_id_"+id).val();
            var guru_id = $("input[name=guru_id]").val();
            var kelas_id = $("input[name=kelas_id]").val();
            
            $.ajax({
                url: "{{ route('simpanNilai') }}",
                type: "POST",
                dataType: 'json',
                data 	: {
                    _token: '{{ csrf_token() }}',
                    id : ulangan_id,
                    siswa_id : id,
                    kelas_id : kelas_id,
                    guru_id : guru_id,
                    tugas : tugas,
                    ulhar1 : ulhar1,
                    uts : uts,
                    ulhar2 : ulhar2,
                    uas : uas,
                },
                success: function(data){
                    alert("Nilai pengetahuan siswa berhasil ditambahkan!");
                    location.reload();
                },
                error: function (data) {
                    alert("Errors 404!");
                }
            });
        });
    
    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#UlanganGuru").addClass("active");
</script>
@endsection