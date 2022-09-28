
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-graytext-light">
                    <div class="card-header mb-3 border-bottom border-1">Data BGH </div>

                    <div class="card-body">
                        <form action="{{ route('bg_umum.update', $bgumum->id) }}" method="post">
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
                                    <select name="thn_periode_keg" class="form-select" disabled>
                                        @foreach ($thn as $thn)
                                            @if ($thn == $bgumum->thn_periode_keg)
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
                                        <select name="provinces" id="provinces" class="form-select" disabled>
                                    @else
                                        <select name="provinces" id="provinces" class="form-select" disabled>
                                    @endif
                                        @foreach ($province as $province)
                                            @if ($province->id == $bgumum->province_id)
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
                                            <select name="regency" id="regency" class="form-select" disabled>
                                        @else
                                            <select name="regency" id="regency " class="form-select" disabled>
                                        @endif
                                        @foreach ($city as $city)
                                            @if ($city->id == $bgumum->id_kota)
                                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                            @else
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" disabled name="nama_kecamatan" value="{{ $bgumum->nama_kecamatan }}"
                                    class="form-control @error('nama_kecamatan') is-invalid @enderror">
                                @error('nama_kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Kelurahan</label>
                                <input type="text" disabled name="nama_kelurahan" value="{{ $bgumum->nama_kelurahan }}"
                                    class="form-control @error('nama_kelurahan') is-invalid @enderror">
                                @error('nama_kelurahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">RT</label>
                                <input type="text" disabled name="rt" value="{{ $bgumum->rt }}"
                                    class="form-control @error('rt') is-invalid @enderror">
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">RW</label>
                                <input type="text" disabled name="rw" value="{{ $bgumum->rw }}"
                                    class="form-control @error('rw') is-invalid @enderror">
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No Rumah</label>
                                <input type="text" disabled name="no_rumah" value="{{ $bgumum->no_rumah }}"
                                    class="form-control @error('no_rumah') is-invalid @enderror">
                                @error('no_rumah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Pemilik Bangunan</label>
                                <input type="text" disabled name="nama_pemilik_bangunan" value="{{ $bgumum->nama_pemilik_bangunan }}"
                                    class="form-control @error('nama_pemilik_bangunan') is-invalid @enderror">
                                @error('nama_pemilik_bangunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No KTP Pemilik Bangunan</label>
                                <input type="text" disabled name="no_ktp_pemilik_bangunan" value="{{ $bgumum->no_ktp_pemilik_bangunan }}"
                                    class="form-control @error('no_ktp_pemilik_bangunan') is-invalid @enderror">
                                @error('no_ktp_pemilik_bangunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat Bangunan</label>
                                <input type="text" disabled name="alamat_bangunan" value="{{ $bgumum->alamat_bangunan }}"
                                    class="form-control @error('alamat_bangunan') is-invalid @enderror">
                                @error('alamat_bangunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Fungsi Bangunan</label>
                                <input type="text" disabled name="fungsi_bangunan" value="{{ $bgumum->fungsi_bangunan }}"
                                    class="form-control @error('fungsi_bangunan') is-invalid @enderror">
                                @error('fungsi_bangunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kepemilikan</label>
                                <input type="text" disabled name="kepemilikan" value="{{ $bgumum->kepemilikan }}"
                                    class="form-control @error('kepemilikan') is-invalid @enderror">
                                @error('kepemilikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Memiliki IMB</label>
                                <input type="text" disabled name="memiliki_imb" value="{{ $bgumum->memiliki_imb }}"
                                    class="form-control @error('memiliki_imb') is-invalid @enderror">
                                @error('memiliki_imb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No IMB</label>
                                <input type="text" disabled name="no_imb" value="{{ $bgumum->no_imb }}"
                                    class="form-control @error('no_imb') is-invalid @enderror">
                                @error('no_imb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Memiliki SLF</label>
                                <input type="text" disabled name="memiliki_slf" value="{{ $bgumum->memiliki_slf }}"
                                    class="form-control @error('memiliki_slf') is-invalid @enderror">
                                @error('memiliki_slf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No SLF</label>
                                <input type="text" disabled name="no_slf" value="{{ $bgumum->no_slf }}"
                                    class="form-control @error('no_slf') is-invalid @enderror">
                                @error('no_slf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tingkat Kompleksitas</label>
                                <input type="text" disabled name="tingkat_kompleksitas" value="{{ $bgumum->tingkat_kompleksitas }}"
                                    class="form-control @error('tingkat_kompleksitas') is-invalid @enderror">
                                @error('tingkat_kompleksitas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tingkat Permanensi</label>
                                <input type="text" disabled name="tingkat_permanensi" value="{{ $bgumum->tingkat_permanensi }}"
                                    class="form-control @error('tingkat_permanensi') is-invalid @enderror">
                                @error('tingkat_permanensi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tingkat Risiko Kebakaran</label>
                                <input type="text" disabled name="tingkat_risiko_kebakaran" value="{{ $bgumum->tingkat_risiko_kebakaran }}"
                                    class="form-control @error('tingkat_risiko_kebakaran') is-invalid @enderror">
                                @error('tingkat_risiko_kebakaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tingkat Risiko Kebakaran</label>
                                <input type="text" disabled name="tingkat_risiko_kebakaran" value="{{ $bgumum->tingkat_risiko_kebakaran }}"
                                    class="form-control @error('tingkat_risiko_kebakaran') is-invalid @enderror">
                                @error('tingkat_risiko_kebakaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Zona Gempa</label>
                                <input type="text" disabled name="zona_gempa" value="{{ $bgumum->zona_gempa }}"
                                    class="form-control @error('zona_gempa') is-invalid @enderror">
                                @error('zona_gempa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kategori Lokasi</label>
                                <input type="text" disabled name="kategori_lokasi" value="{{ $bgumum->kategori_lokasi }}"
                                    class="form-control @error('kategori_lokasi') is-invalid @enderror">
                                @error('kategori_lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kategori Ketinggian</label>
                                <input type="text" disabled name="kategori_ketinggian" value="{{ $bgumum->kategori_ketinggian }}"
                                    class="form-control @error('kategori_ketinggian') is-invalid @enderror">
                                @error('kategori_ketinggian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('bgh.index') }}" class="btn btn-danger">Kembali</a>
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
