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
                                    <th class="ctr" rowspan="2">No.</th>
                                    <th rowspan="2">Nama Siswa</th>
                                    <th class="ctr" colspan="3">Pengetahuan</th>
                                    <th class="ctr" colspan="3">Keterampilan</th>
                                    <th class="ctr" rowspan="2">Aksi</th>
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
                                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                                    <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                                    @foreach ($siswa as $data)
                                        <input type="hidden" name="siswa_id" value="{{$data->id}}">
                                        <tr>
                                            <td class="ctr">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->nilai($data->id))
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
                                                @if ($data->nilai($data->id)->nilaip && $data->nilai($data->id)->nilaik)
                                                    <td class="ctr">
                                                        <div class="ka_{{$data->id}} text-center">{{ $data->nilai($data->id)->nilaik }}</div> 
                                                    </td>
                                                    <td class="ctr">
                                                        <div class="kp_{{$data->id}} text-center">{{ $data->nilai($data->id)->predikatk }}</div>
                                                    </td>
                                                    <td class="ctr">
                                                        <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled>{{ $data->nilai($data->id)->deskripsik }}</textarea>
                                                    </td>
                                                    <td class="ctr">
                                                        <i class="fas fa-check" style="font-weight:bold;"></i>
                                                    </td>
                                                @else
                                                    <td class="ctr">
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
                                                    </td>
                                                @endif
                                            @else
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
                                            @endif
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
        @endsection
        @section('js')
        
            <script>
                $("input[name=nilai]").keyup(function(){
                    var id = $(this).attr('data-ids');
                    var guru_id = $("input[name=guru_id]").val();
                    var angka = $(".nilai_"+id).val();
                    if (angka.length == 2){
                        $.ajax({
                            type:"GET",
                            data: {
                                id : guru_id,
                                nilai : angka
                            },
                            dataType:"JSON",
                            url:"{{ url('/keterampilan/predikat') }}",
                            success:function(data){
                                $(".predikat_"+id).val(data[0]['predikat']);
                                $(".deskripsi_"+id).val(data[0]['deskripsi']);
                            },
                            error:function(){
                                toastr.warning("Tolong masukkan nilai kkm & predikat!");
                            }
                        });
                    } else {
                        $(".predikat_"+id).val("");
                        $(".deskripsi_"+id).val("");
                    }
                });
        
                $(".btn_click").click(function(){
                    var id = $(this).attr('data-id');
                    var rapot = $(".rapot_"+id).val();
                    var nilai = $(".nilai_"+id).val();
                    var predikat = $(".predikat_"+id).val();
                    var deskripsi = $(".deskripsi_"+id).val();
                    var guru_id = $("input[name=guru_id]").val();
                    var kelas_id = $("input[name=kelas_id]").val();
                    var ok = ('<i class="fas fa-check" style="font-weight:bold;"></i>')
        
                    if (nilai == "") {
                        toastr.error("Form tidak boleh ada yang kosong!");
                    } else {
                        $.ajax({
                            url: "/keterampilan/simpan",
                            type: "POST",
                            dataType: 'json',
                            data 	: {
                                _token: '{{ csrf_token() }}',
                                id : rapot,
                                siswa_id : id,
                                kelas_id : kelas_id,
                                guru_id : guru_id,
                                nilai : nilai,
                                predikat : predikat,
                                deskripsi : deskripsi,
                            },
                            success: function(data){
                                $(".nilai_"+id).remove();
                                $(".predikat_"+id).remove();
                                $("#submit-"+id).remove();
                                $(".knilai_"+id).append(nilai);
                                $(".kpredikat_"+id).append(predikat);
                                $(".sub_"+id).append(ok);
                                toastr.success("Nilai rapot siswa berhasil ditambahkan!");
                            },
                            error: function (data) {
                                toastr.warning("Errors 404!");
                            }
                        });
                    }
                });
        
                $("#NilaiGuru").addClass("active");
                $("#liNilaiGuru").addClass("menu-open");
                $("#RapotGuru").addClass("active");
            </script>
        @endsection
        