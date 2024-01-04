@extends('guru.layouts.tempcrud')
@section('isi')
    <!-- general form elements -->
    <div class="content-wrapper" style="width: 1350px">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-4">
                            <h6>Daftar Nilai</h6>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12"><p>Silahkan isi nilai sesuai dengan nama pelajaran masing-masing!</p></div>
                        </div>
    
                        <div class="row">
                            <form action="{{route('storePostNilai')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
    
                                @foreach($postnilai as $pn)
                                    <input type="hidden" name="id[]" value="{{$pn->id}}">
                                @endforeach
    
                                @if (session('error') === '')
                                    <div class="mt-2 alert alert-success">
                                        <i class="link-icon" data-feather="check-circle"></i> Berhasil menyimpan data!
                                    </div>
                                @elseif(session('error') == 1)
                                    <div class="mt-2 alert alert-danger">
                                        <i class="link-icon" data-feather="alert-circle"></i> Gagal saat mencoba menyimpan data, silahkan coba kembali!
                                    </div>
                                @endif
    
                                <table class="table table-bordered table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Pelajaran</th>
                                        <th colspan="5" class="text-center">Data Nilai</th>
                                    </tr>
                                    <tr>
                                        <th>Semester 1</th>
                                        <th>Semester 2</th>
                                        <th>Semester 3</th>
                                        <th>Semester 4</th>
                                        <th>Semester 5</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($nilai as $index => $val)
                                        <input type="hidden" name="nilai_id[]" value="{{$val->id}}">
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$val->nilai_name}}</td>
                                            <td><input name="s1[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s1)) ? $postnilai[$index]->score_s1 : 0}}"></td>
                                            <td><input name="s2[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s2)) ? $postnilai[$index]->score_s2 : 0}}"></td>
                                            <td><input name="s3[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s3)) ? $postnilai[$index]->score_s3 : 0}}"></td>
                                            <td><input name="s4[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s4)) ? $postnilai[$index]->score_s4 : 0}}"></td>
                                            <td><input name="s5[]" class="form-control" type="text" value="{{(isset($postnilai[$index]->score_s5)) ? $postnilai[$index]->score_s5 : 0}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
    
                                <div class="mt-1">
                                    <button type="submit" class="btn btn-sm btn-danger me-2 mb-2">
                                        <i class="btn-icon-prepend" data-feather="link"></i>
                                        Simpan Nilai
                                    </button>
                                </div>
                            </form>
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
 $(document).ready(function() {
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
            dataType: "json",
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
                toastr.success("Nilai ulangan siswa berhasil ditambahkan!");
                location.reload();
            },
            error: function (data) {
                toastr.warning("Errors 404!");
            }
        });
    });
});
    
    $("#nilai").addClass("active");
    $("#kriteria").addClass("menu-open");
    $("#inilai").addClass("active");
</script>
@endsection