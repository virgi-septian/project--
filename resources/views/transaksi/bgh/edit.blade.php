
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-graytext-light">
                    <div class="card-header mb-3 border-bottom border-1">Data BGH </div>

                    <div class="card-body">
                        <form action="{{ route('bgh.update', $bgh->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Thn Periode Kegiatan</label>
                                <div class="form-group">
                                    @php
                                        for ($i=date('Y'); $i >= 2015; $i--) {
                                            $thn[$i] = $i;
                                        }
                                    @endphp
                                    <select name="thn_periode_keg" class="form-select">
                                        @foreach ($thn as $thn)
                                            @if ($thn == $bgh->thn_periode_keg)
                                                <option value="{{$thn}}" selected>{{$thn}}</option>
                                            @else
                                                <option value="{{$thn}}">{{$thn}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Pilih Propinsi</label>
                                <div class="form-group">
                                    @if (Auth::user()->role_id != NULL)
                                        <select name="provinces" id="provinces" class="form-select">
                                    @else
                                        <select name="provinces" id="provinces" class="form-select">
                                    @endif
                                        @foreach ($province as $province)
                                            @if ($province->id == $bgh->province_id)
                                                <option value="{{$province->id}}" selected>{{$province->name}}</option>
                                            @else
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Pilih Kabupaten/Kota</label>
                                <div class="form-group">

                                        @if (Auth::user()->role_id != NULL)
                                            <select name="regency" id="regency" class="form-select">
                                        @else
                                            <select name="regency" id="regency " class="form-select">
                                        @endif
                                        @foreach ($city as $city)
                                            @if ($city->id == $bgh->id_kota)
                                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                            @else
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" value="{{ $bgh->nama_kegiatan }}"
                                    class="form-control @error('nama_kegiatan') is-invalid @enderror">
                                @error('nama_kegiatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tahun Anggaran</label>
                                <input type="date" name="thn_anggaran" value="{{ $bgh->thn_anggaran }}"
                                    class="form-control @error('thn_anggaran') is-invalid @enderror">
                                @error('thn_anggaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Sumber Anggaran</label>
                                <input type="text" name="sumber_anggaran" value="{{ $bgh->sumber_anggaran }}"
                                    class="form-control @error('sumber_anggaran') is-invalid @enderror">
                                @error('sumber_anggaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Alokasi Anggaran</label>
                                <input type="text" name="alokasi_anggaran" value="{{ $bgh->alokasi_anggaran }}"
                                    class="form-control @error('alokasi_anggaran') is-invalid @enderror">
                                @error('alokasi_anggaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Volume Pekerjaan</label>
                                <input type="text" name="volume_pekerjaan" value="{{ $bgh->volume_pekerjaan }}"
                                    class="form-control @error('volume_pekerjaan') is-invalid @enderror">
                                @error('volume_pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status Aset</label>
                                <input type="text" name="status_aset" value="{{ $bgh->status_aset }}"
                                    class="form-control @error('status_aset') is-invalid @enderror">
                                @error('status_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Instansi Unit Organisasi Pelaksana</label>
                                <input type="text" name="instansi_unit_organisasi_pelaksana" value="{{ $bgh->instansi_unit_organisasi_pelaksana }}"
                                    class="form-control @error('instansi_unit_organisasi_pelaksana') is-invalid @enderror">
                                @error('instansi_unit_organisasi_pelaksana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Lokasi Kegiatan Proyek</label>
                                <input type="text" name="lokasi_kegiatan_proyek" value="{{ $bgh->lokasi_kegiatan_proyek }}"
                                    class="form-control @error('lokasi_kegiatan_proyek') is-invalid @enderror">
                                @error('lokasi_kegiatan_proyek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Kepala Dinas</label>
                                <input type="text" name="nama_kepala_dinas" value="{{ $bgh->nama_kepala_dinas }}"
                                    class="form-control @error('nama_kepala_dinas') is-invalid @enderror">
                                @error('nama_kepala_dinas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Pengelola</label>
                                <input type="text" name="nama_pengelola" value="{{ $bgh->nama_pengelola }}"
                                    class="form-control @error('nama_pengelola') is-invalid @enderror">
                                @error('nama_pengelola')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Penyedia Jasa Perencanaan</label>
                                <input type="text" name="nama_penyedia_jasa_perencanaan" value="{{ $bgh->nama_penyedia_jasa_perencanaan }}"
                                    class="form-control @error('nama_penyedia_jasa_perencanaan') is-invalid @enderror">
                                @error('nama_penyedia_jasa_perencanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tahun Penerbitan Sertifikat BGH</label>
                                <input type="date" name="thn_penerbitan_sertifikat_bgh" value="{{ $bgh->thn_penerbitan_sertifikat_bgh }}"
                                    class="form-control @error('thn_penerbitan_sertifikat_bgh') is-invalid @enderror">
                                @error('thn_penerbitan_sertifikat_bgh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No Sertifikat BGH</label>
                                <input type="text" name="no_sertifikat_bgh" value="{{ $bgh->no_sertifikat_bgh }}"
                                    class="form-control @error('no_sertifikat_bgh') is-invalid @enderror">
                                @error('no_sertifikat_bgh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No Plaka BGH</label>
                                <input type="text" name="no_plakat_bgh" value="{{ $bgh->no_plakat_bgh }}"
                                    class="form-control @error('no_plakat_bgh') is-invalid @enderror">
                                @error('no_plakat_bgh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tahun Penerbitan Sertifikat Pemanfaatan BGH</label>
                                <input type="date" name="thn_penerbitan_sertifikat_pemanfaatan_bgh" value="{{ $bgh->thn_penerbitan_sertifikat_pemanfaatan_bgh }}"
                                    class="form-control @error('thn_penerbitan_sertifikat_pemanfaatan_bgh') is-invalid @enderror">
                                @error('thn_penerbitan_sertifikat_pemanfaatan_bgh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Peringkat BGH</label>
                                <input type="text" name="peringkat_bgh" value="{{ $bgh->peringkat_bgh }}"
                                    class="form-control @error('peringkat_bgh') is-invalid @enderror">
                                @error('peringkat_bgh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pemanfaatan Ke</label>
                                <input type="text" name="pemanfaatan_ke" value="{{ $bgh->pemanfaatan_ke }}"
                                    class="form-control @error('pemanfaatan_ke') is-invalid @enderror">
                                @error('pemanfaatan_ke')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <button type="submit" name="save" class="btn btn-primary">Simpan </button>
                                    <a href="{{ route('bgh.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery-3.6.1.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#provinces').on('change', function () {
                    var province_id = $(this).val();
                    var div = $(this).parent();
                    var op = " ";
                        $.ajax({
                            type:'GET',
                            url: '{{ route('asset.region.list')}}/' + province_id,
                            success:function(response){
                            var response = jQuery.parseJSON(response);
                            // console.log(response);
                            // console.log(response.length);
                                $('#regency').empty();
                                $('#regency').append(`<option style="width=320px" value="0" disabled selected>Pilih Kota</option>`);
                                response.forEach(element => {
                                   $('#regency').append(`<option class="form-select" value="${element['id']}" style="width=320px" >${element['name']}</option>`);
                                   });
                                }
                            });
                        });
        });
    //$('#provinces').val();
    </script>


@endsection
