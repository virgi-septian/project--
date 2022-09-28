@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Bangunan Umum
                        <a href="{{ route('bg_umum.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>Status Verifikasi Data</th>
                                        <th>Komentar Verifikasi</th>
                                        <th>Status Data</th>
                                        <th>Tahun Periode Kegiatan</th>
                                        <th>Propinsi</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Kelurahan</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        {{-- <th>No. Rumah</th>
                                        <th>Nama Pemilik Bangunan</th>
                                        <th>No KTP Pemilik Bangunan</th>
                                        <th>Alamat Bangunan</th>
                                        <th>Fungsi Bangunan</th>
                                        <th>Memiliki IMB</th>
                                        <th>No IMB</th>
                                        <th>Memiliki SLF</th>
                                        <th>No SLF</th>
                                        <th>Tingkat Kompleksitas</th>
                                        <th>Tingkat Permanensi</th>
                                        <th>Tingkat Risiko Kebakaran</th>
                                        <th>Zona Gempa</th>
                                        <th>Kategori Lokasi</th>
                                        <th>Kategori Ketinggian</th>
                                        <th>Kepemilikan</th>
                                        <th>Titik Kordinat Lat</th>
                                        <th>Titik Kordinat Long</th>
                                         --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($BgUmum as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <a href="{{ route('bg_umum.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success overflow-hidden ms-1"><i class="bi bi-pencil-fill"></i>
                                                </a> 
                                                <a href="{{ route('bg_umum.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning ms-1"><i class="bi bi-eye-fill"></i>
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('bg_umum.destroy', $data->id) }}" class="d-inline" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger ms-1"
                                                        onclick="return confirm('Are You Sure?')"><i class="bi bi-trash"></i></button>
                                                </form>
                                                @endrole
                                                </div>
                                            </td>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->verified}}</td>
                                            <td>{{ $data->verified_by }}</td>
                                            <td></td>
                                            <td>{{ $data->thn_periode_keg }}</td>
                                            <td>{{ $data->province->name }}</td>
                                            <td>{{ $data->regency->name }}</td>
                                            <td>{{ $data->nama_kecamatan }}</td>
                                            <td>{{ $data->nama_kelurahan }}</td>
                                            <td>{{ $data->rt }}</td>
                                            <td>{{ $data->rw }}</td>
                                            {{-- <td>{{ $data->no_rumah }}</td>
                                            <td>{{ $data->nama_pemilik_bangunan }}</td>
                                            <td>{{ $data->no_ktp_pemilik_bangunan }}</td>
                                            <td>{{ $data->alamat_bangunan }}</td>
                                            <td>{{ $data->fungsi_bangunan }}</td>
                                            <td>{{ $data->memiliki_imb}}</td>
                                            <td>{{ $data->no_imb}}</td>
                                            <td>{{ $data->memiliki_slf}}</td>
                                            <td>{{ $data->no_slf }}</td>
                                            <td>{{ $data->tingkat_kompleksitas }}</td>
                                            <td>{{ $data->tingkat_permanensi}}</td>
                                            <td>{{ $data->tingkat_risiko_kebakaran }}</td>
                                            <td>{{ $data->zona_gempa }}</td>
                                            <td>{{ $data->kategori_lokasi }}</td>
                                            <td>{{ $data->kategori_ketinggian }}</td>
                                            <td>{{ $data->kepemilikan }}</td>
                                            <td>{{ $data->titik_koordinat_lat }}</td>
                                            <td>{{ $data->titik_koordinat_long }}</td>
                                             --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection