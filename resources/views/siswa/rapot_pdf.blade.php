<!DOCTYPE html>
<html>
<head>
    <title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
                <h4 style="text-align: center">RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h4>
                <br><br>
                <div class="col-md-12">
                    {{-- <table style="margin-left:20px; display:inline">
                        <thead>
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
                        </thead>
                    </table> --}}
                    {{-- <table style="margin-left:40%; display:inline">
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
                    <hr> --}}
                </div>
                <div class="col-md-12">
                    {{-- <div class="row">
                        <div class="col-12" style="margin-left: 2%">
                            <h6><strong>A. Sikap</strong></h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-12"> --}}
                <div class="col-12">
                    <h6><strong>B. Pengetahuan dan Keterampilan</strong></h6>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;" rowspan="2">No.</th>
                                <th style="text-align: center;" rowspan="2">Mata Pelajaran</th>
                                <th style="text-align: center;" rowspan="2">KKM</th>
                                <th style="text-align: center;" colspan="3">Pengetahuan</th>
                                <th style="text-align: center;" colspan="3">Keterampilan</th>
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
                <div class="col-12">
                    <h6><strong>C. Ketidakhadiran</strong></h6>
                    <table class="table table-bordered table-striped">
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
</body>
</html>