@section('title')
Raport
@endsection
@extends('siswa/layouts/temp')
@section('main')
<div class="content-wrapper">
  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
                <div class="card-header">
                    <div text-align="right">
                        <form action="/siswa/rapor">
                        <select name="semester" class="form-control select2" style="width: 20%; display:inline" id="" >
                            <option value="" @selected(true) @disabled(true)>-- Pilih Semester --</option>
                            <option value="1" selected="{{ $semester }}">Ganjil</option>
                            <option value="2" selected="{{ $semester }}">Genap</option>
                        </select>
                        <select class="form-control select2" style="width: 20%; display:inline" name="tahun" id="" >
                            <option value="" @selected(true) @disabled(true)>-- Pilih Tahun ajaran --</option>
                            @foreach ($thn as $tahun)
                            <option value="{{ $tahun->id }}" selected="{{ $tahun }}">{{ $tahun->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Pilih</button>
                    </form>
                        <a href="/siswa/rapor/cetak" style="margin-left:90%" class="btn btn-sm btn-success" target="_blank">Cetak Rapor</a>
                     </div>
                </div>
              <div class="card-body">
                {{-- <h4 style="text-align: center">RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h4> --}}
                <br><br>
                <div class="col-md-12">
                    <table style="margin-left:20px; display:inline">
                        <h4 style="text-align: center">RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h4>
                        <br><br>
                        <tr>
                            <td>Nama Peserta Didik</td>
                            <td>:</td>
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <td>Nama Kelas</td>
                            <td>:</td>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                        </tr>
                    </table>
                    <table style="margin-left:40%; display:inline">
                        @php
                            $bulan = date('m');
                            $tahun = date('Y');
                        @endphp
                        {{-- <tr>
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
                        </tr> --}}
                    </table>
                    <hr>
                </div>
                <div class="col-md-12">
                    {{-- <div class="row">
                        <div class="col-12" style="margin-left: 2%">
                            <h6><strong>A. Sikap</strong></h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-12"> --}}
                <div class="col-12" style="margin-left: 2%">
                    <h6><strong>B. Pengetahuan dan Keterampilan</strong></h6>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center" rowspan="2">No.</th>
                                <th style="text-align: center" rowspan="2">Mata Pelajaran</th>
                                <th style="text-align: center" rowspan="2">KKM</th>
                                <th style="text-align: center" colspan="3">Pengetahuan</th>
                                <th style="text-align: center" colspan="3">Keterampilan</th>
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
                            @foreach ($rapot as $val => $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pelajaran->nama_pelajaran }}</td>
                                    <td class="ctr">{{ $data->kkm($data->guru_id) }}</td>
                                    <td class="ctr">{{(isset($rapot[$val]->nilaip)) ? $rapot[$val]->nilaip : '-' }}</td>
                                    <td class="ctr">{{ (isset($rapot[$val]->predikatp)) ? $rapot[$val]->predikatp : '-' }}</td>
                                    <td class="ctr">{{ (isset($rapot[$val]->deskripsip)) ? $rapot[$val]->deskripsip : '-' }}</td>
                                    <td class="ctr">{{ (isset($rapot[$val]->nilaik)) ? $rapot[$val]->nilaik : '-' }}</td>
                                    <td class="ctr">{{ (isset($rapot[$val]->predikatk)) ? $rapot[$val]->predikatk : '-' }}</td>
                                    <td class="ctr">{{ (isset($rapot[$val]->deskripsik)) ? $rapot[$val]->deskripsik : '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br><br>
                <div class="col-12" style="margin-left: 2%">
                    <h6><strong>C. Ketidakhadiran</strong></h6>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td width="50px">Sakit :</td>
                            <td>{{ $jmlsakit }} hari</td>
                        </tr>
                        <tr>
                            <td>Izin :</td>
                            <td>{{ $jmlizin }} hari</td>
                        </tr>
                        <tr>
                            <td>Tanpa Keterangan :</td>
                            <td>{{ $jmlalpa }} hari</td>
                        </tr>
                    </table>
                </div>
                  {{-- <a href="/siswa/home"><button type="button" class="btn btn-secondary" style="padding: 10px 25px 10px 25px">Kembali</button></a> --}}
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
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection