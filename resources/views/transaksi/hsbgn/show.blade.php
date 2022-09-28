
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-graytext-light">
                    <div class="card-header mb-3 border-bottom border-1">Data HSBGN </div>

                    <div class="card-body">
                        <form action="{{ route('hsbgn.update', $hsbgn->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Thn Periode Kegiatan </label>
                                <div class="form-group">
                                    @php
                                        for ($i=date('Y'); $i >= 2015; $i--) {
                                            $thn[$i] = $i;
                                        }
                                    @endphp
                                    <select name="thn_periode_keg" class="form-select">
                                        @foreach ($thn as $thn)
                                            @if ($thn == $hsbgn->thn_periode_keg)
                                                <option value="{{$thn}}" selected>{{$thn}}</option>
                                            @else
                                                <option value="{{$thn}}">{{$thn}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Pilih Propinsi </label>
                                <div class="form-group">
                                    @if (Auth::user()->role_id != NULL)
                                        <select name="provinces" id="provinces" class="form-select">
                                    @else
                                        <select name="provinces" id="provinces" class="form-select">
                                    @endif
                                        @foreach ($province as $province)
                                            @if ($province->id == $hsbgn->province_id)
                                                <option value="{{$province->id}}" selected>{{$province->name}}</option>
                                            @else
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Pilih Kabupaten/Kota </label>
                                <div class="form-group">

                                        @if (Auth::user()->role_id != NULL)
                                            <select name="regency" id="regency" class="form-select">
                                        @else
                                            <select name="regency" id="regency " class="form-select">
                                        @endif
                                        @foreach ($city as $city)
                                            @if ($city->id == $hsbgn->id_kota)
                                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                            @else
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Tahun Penetapan </label>
                                <input type="text" disabled name="tahun_penetapan"
                                    class="form-control @error('tahun_penetapan') is-invalid @enderror">
                                @error('tahun_penetapan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Kecamatan </label>
                                <input type="text" disabled name="nama_kecamatan" value="{{ $hsbgn->nama_kecamatan }}"
                                    class="form-control @error('nama_kecamatan') is-invalid @enderror">
                                @error('nama_kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Kecamatan </label>
                                <input type="text" disabled name="angka_luas_wilayah" value="{{ $hsbgn->angka_luas_wilayah }}"
                                    class="form-control @error('angka_luas_wilayah') is-invalid @enderror">
                                @error('angka_luas_wilayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Angka Luas Wilayah </label>
                                <input type="text" disabled name="angka_luas_wilayah" value="{{ $hsbgn->angka_luas_wilayah }}"
                                    class="form-control @error('angka_luas_wilayah') is-invalid @enderror">
                                @error('angka_luas_wilayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Satuan Luas Wilayah </label>
                                <input type="text" disabled name="satuan_luas_wilayah" value="{{ $hsbgn->satuan_luas_wilayah }}"
                                    class="form-control @error('satuan_luas_wilayah') is-invalid @enderror">
                                @error('satuan_luas_wilayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Zona </label>
                                <input type="text" disabled name="zona" value="{{ $hsbgn->zona }}"
                                    class="form-control @error('zona') is-invalid @enderror">
                                @error('zona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Bangunan Tidak Sederhana </label>
                                <input type="text" disabled name="bg_tidak_sederhana" value="{{ $hsbgn->bg_tidak_sederhana }}"
                                    class="form-control @error('bg_tidak_sederhana') is-invalid @enderror">
                                @error('bg_tidak_sederhana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Bangunan Sederhana </label>
                                <input type="text" disabled name="bg_sederhana" value="{{ $hsbgn->bg_sederhana }}"
                                    class="form-control @error('bg_sederhana') is-invalid @enderror">
                                @error('bg_sederhana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Rumah Negara Tipe A </label>
                                <input type="text" disabled name="rumahnegara_tipe_a" value="{{ $hsbgn->rumahnegara_tipe_a }}"
                                    class="form-control @error('rumahnegara_tipe_a') is-invalid @enderror">
                                @error('rumahnegara_tipe_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Rumah Negara Tipe B </label>
                                <input type="text" disabled name="rumahnegara_tipe_b" value="{{ $hsbgn->rumahnegara_tipe_b }}"
                                    class="form-control @error('rumahnegara_tipe_b') is-invalid @enderror">
                                @error('rumahnegara_tipe_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Rumah Negara Tipe C,D,E </label>
                                <input type="text" disabled name="rumahnegara_tipe_c_d_e" value="{{ $hsbgn->rumahnegara_tipe_c_d_e }}"
                                    class="form-control @error('rumahnegara_tipe_c_d_e') is-invalid @enderror">
                                @error('rumahnegara_tipe_c_d_e')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pagar Gedung Negara Depan </label>
                                <input type="text" disabled name="pagar_gedungnegara_depan" value="{{ $hsbgn->pagar_gedungnegara_depan }}"
                                    class="form-control @error('pagar_gedungnegara_depan') is-invalid @enderror">
                                @error('pagar_gedungnegara_depan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pagar Gedung Negara samping </label>
                                <input type="text" disabled name="pagar_gedungnegara_samping" value="{{ $hsbgn->pagar_gedungnegara_samping }}"
                                    class="form-control @error('pagar_gedungnegara_samping') is-invalid @enderror">
                                @error('pagar_gedungnegara_samping')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pegar Gedung Negara samping </label>
                                <input type="text" disabled name="pagar_gedungnegara_belakang" value="{{ $hsbgn->pagar_gedungnegara_belakang }}"
                                    class="form-control @error('pagar_gedungnegara_belakang') is-invalid @enderror">
                                @error('pagar_gedungnegara_belakang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pagar Rumah Negara Depan </label>
                                <input type="text" disabled name="pagar_rumahnegara_depan" value="{{ $hsbgn->pagar_rumahnegara_depan }}"
                                    class="form-control @error('pagar_rumahnegara_depan') is-invalid @enderror">
                                @error('pagar_rumahnegara_depan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pagar Rumah Negara Samping </label>
                                <input type="text" disabled name="pagar_rumahnegara_samping" value="{{ $hsbgn->pagar_rumahnegara_samping }}"
                                    class="form-control @error('pagar_rumahnegara_samping') is-invalid @enderror">
                                @error('pagar_rumahnegara_samping')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Pagar Rumah Negara Belakang </label>
                                <input type="text" disabled name="pagar_rumahnegara_belakang" value="{{ $hsbgn->pagar_rumahnegara_belakang }}"
                                    class="form-control @error('pagar_rumahnegara_belakang') is-invalid @enderror">
                                @error('pagar_rumahnegara_belakang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">SK Penetapan </label>
                                <input type="text" disabled name="sk_penetapan"
                                    class="form-control @error('sk_penetapan') is-invalid @enderror">
                                @error('sk_penetapan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Indeks Kemalahan Konstruksi </label>
                                <input type="text" disabled name="indeks_kemahalan_konstruksi" value="{{ $hsbgn->indeks_kemahalan_konstruksi }}"
                                    class="form-control @error('indeks_kemahalan_konstruksi') is-invalid @enderror">
                                @error('indeks_kemahalan_konstruksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('hsbgn.index') }}" class="btn btn-danger">Kembali</a>
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
