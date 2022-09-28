@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-light">
                    <div class="card-header mb-3 border-bottom border-1">Data HSBGN
                        <a href="{{ route('hsbgn.create') }}"
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
                                        <th>Tahun Penetapan</th>
                                        <th>Nama Kecamatan</th>
                                        {{-- <th>Angka Luas Wilayah</th>
                                        <th>Satuan Luas Wilayah</th>
                                        <th>Zona</th>
                                        <th>Bangunan Gedung Tidak Sederhana</th>
                                        <th>Bangunan Gedung Sederhana</th>
                                        <th>Rumah Negara Tipe A</th>
                                        <th>Rumah Negara Tipe B</th>
                                        <th>Rumah Negara Tipe C,D,E</th>
                                        <th>Pagar Gedung Negara Depan</th>
                                        <th>Pagar Gedung Negara Samping</th>
                                        <th>Pagar Gedung Negara Belakang</th>
                                        <th>Pagar Rumah Negara Depan</th>
                                        <th>Pagar Rumah Negara Samping</th>
                                        <th>Pagar Rumah Negara Belakang</th>
                                        <th>SK Penetapan</th>
                                        <th>Indexs Kemahalan Konstruksi(IKK)</th> --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($hsbgn as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <a href="{{ route('hsbgn.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success overflow-hidden ms-1"><i class="bi bi-pencil-fill"></i>
                                                </a> 
                                                <a href="{{ route('hsbgn.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning ms-1"><i class="bi bi-eye-fill"></i>
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('hsbgn.destroy', $data->id) }}" class="d-inline" method="post">
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
                                            <td>{{ $data->tahun_penetapan }}</td>
                                            <td>{{ $data->nama_kecamatan }}</td>
                                            {{-- <td>{{ $data->angka_luas_wilayah }}</td>
                                            <td>{{ $data->satuan_luas_wilayah }}</td>
                                            <td>{{ $data->zona }}</td>
                                            <td>{{ $data->bg_tidak_sederhana }}</td>
                                            <td>{{ $data->bg_sederhana }}</td>
                                            <td>{{ $data->rumahnegara_tipe_a }}</td>
                                            <td>{{ $data->rumahnegara_tipe_b }}</td>
                                            <td>{{ $data->rumahnegara_tipe_c_d_e }}</td>
                                            <td>{{ $data->pagar_gedungnegara_depan }}</td>
                                            <td>{{ $data->pagar_gedungnegara_samping }}</td>
                                            <td>{{ $data->pagar_gedungnegara_belakang }}</td>
                                            <td>{{ $data->pagar_rumahnegara_depan }}</td>
                                            <td>{{ $data->pagar_rumahnegara_samping }}</td>
                                            <td>{{ $data->pagar_rumahnegara_belakang }}</td>
                                            <td>{{ $data->sk_penetapan }}</td>
                                            <td>{{ $data->indeks_kemahalan_konstruksi }}</td> --}}
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