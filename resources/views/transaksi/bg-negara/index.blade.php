@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Bangunan Negara
                        <a href="{{ route('bg_negara.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="1000px" class="table align-middle" id="dataTable">
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
                                        <th>Nama Bangunan Gedung Negara</th>
                                        {{-- <th>Instansi Pemilik Bangunan Gedung Negara</th>
                                        <th>Alamat Bangunan Gedung Negara</th>
                                        <th>Luas Bangunan Gedung Negara(m2)</th>
                                        <th>Titik Kordinat Lat</th>
                                        <th>Titik Kordinat Long</th> --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($BgNegara as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <a href="{{ route('bg_negara.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success overflow-hidden ms-1"><i class="bi bi-pencil-fill"></i>
                                                </a> 
                                                <a href="{{ route('bg_negara.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning ms-1"><i class="bi bi-eye-fill"></i>
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('bg_negara.destroy', $data->id) }}" class="d-inline" method="post">
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
                                            <td>{{ $data->nama_bg_negara }}</td>
                                            {{-- <td>{{ $data->instansi_pemilik_bg_negara }}</td>
                                            <td>{{ $data->alamat_bg_negara }}</td>
                                            <td>{{ $data->luas_bg_negara_m2 }}</td>
                                            <td>{{ $data->titik_koordinat_lat }}</td>
                                            <td>{{ $data->titik_koordinat_long }}</td> --}}
                                            
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