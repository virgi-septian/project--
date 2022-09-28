@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Bangunan Gedung Hijau
                        <a href="{{ route('bgh.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th >Action</th>
                                        <th >No</th>
                                        <th >Status Verifikasi Data</th>
                                        <th >Komentar Verifikasi</th>
                                        <th >Status Data</th>
                                        <th >Tahun Periode Kegiatan</th>
                                        <th >Propinsi</th>
                                        <th >Kabupaten/Kota</th>
                                        <th >Nama Kegiatan</th>
                                        {{-- <th >Tahun Anggaran</th>
                                        <th >Sumber Anggaran</th>
                                        <th >Alokasi Anggaran Rp. (1.000)</th>
                                        <th >Volume Pekerjaan(m2)</th>
                                        <th >Instansi/Unit Organisasi Pelaksan</th>
                                        <th >Lokasi Kegiatan Projek</th>
                                        <th >Titik Kordinat Lat</th>
                                        <th >Titik kordinat Long</th>
                                        <th >Status Aset</th>
                                        <th >Nama Kepala Dinas</th>
                                        <th >Nama Pengelola</th>
                                        <th >Nama Penyedia Jasa Perencanaan</th>
                                        <th >Thn Penerbitan Sertifikat Bangunan Gedung Hijau (BGH)</th>
                                        <th >No Sertifikat BGH</th>
                                        <th >No Plakat BGH</th>
                                        <th >Thn Penerbitan Sertifikat Pemanfaatan BGH</th>
                                        <th >Peringkat Bgh</th>
                                        <th >Pemanaatan Ke</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($bgh as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <a href="{{ route('bgh.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success overflow-hidden ms-1"><i class="bi bi-pencil-fill"></i>
                                                </a> 
                                                <a href="{{ route('bgh.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning ms-1"><i class="bi bi-eye-fill"></i>
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('bgh.destroy', $data->id) }}" class="d-inline" method="post">
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
                                            <td>{{ $data->nama_kegiatan }}</td>
                                            {{-- <td>{{ $data->thn_anggaran }}</td>
                                            <td>{{ $data->sumber_anggaran }}</td>
                                            <td>{{ $data->alokasi_anggaran }}</td>
                                            <td>{{ $data->volume_pekerjaan }}</td>
                                            <td>{{ $data->instansi_unit_organisasi_pelaksana }}</td>
                                            <td>{{ $data->lokasi_kegiatan_proyek }}</td>
                                            <td>{{ $data->titik_koordinat_lat }}</td>
                                            <td>{{ $data->titik_koordinat_long }}</td>
                                            <td>{{ $data->status_aset }}</td>
                                            <td>{{ $data->nama_kepala_dinas }}</td>
                                            <td>{{ $data->nama_pengelola }}</td>
                                            <td>{{ $data->nama_penyedia_jasa_perencanaan }}</td>
                                            <td>{{ $data->thn_penerbitan_sertifikat_bgh }}</td>
                                            <td>{{ $data->no_sertifikat_bgh }}</td>
                                            <td>{{ $data->no_plakat_bgh }}</td>
                                            <td>{{ $data->thn_penerbitan_sertifikat_pemanfaatan_bgh }}</td>
                                            <td>{{ $data->peringkat_bgh}}</td>
                                            <td>{{ $data->pemanfaatan_ke }}</td> --}}
                                            
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