@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-graytext-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Bangunan Negara </div>

                    <div class="card-body">
                        <form action="{{ route('bg_negara.update', $bgumum->id) }}" method="post">
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
                                        <select name="provinces" id="provinces" class="form-select">
                                    @else
                                        <select name="provinces" id="provinces" class="form-select">
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
                                            <select name="regency" id="regency" class="form-select">
                                        @else
                                            <select name="regency" id="regency " class="form-select">
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
                                <label for="">Nama Bangunan Negara</label>
                                <input type="text" name="nama_bg_negara" value="{{ $bgumum->nama_bg_negara }}"
                                    class="form-control @error('nama_bg_negara') is-invalid @enderror">
                                @error('nama_bg_negara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Instansi Pemilik Bangunan Negara</label>
                                <input type="text" name="instansi_pemilik_bg_negara" value="{{ $bgumum->instansi_pemilik_bg_negara }}"
                                    class="form-control @error('instansi_pemilik_bg_negara') is-invalid @enderror">
                                @error('instansi_pemilik_bg_negara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat Bangunan Negara</label>
                                <input type="text" name="alamat_bg_negara" value="{{ $bgumum->alamat_bg_negara }}"
                                    class="form-control @error('alamat_bg_negara') is-invalid @enderror">
                                @error('alamat_bg_negara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Luas Bangunan Negara M2</label>
                                <input type="text" name="luas_bg_negara_m2" value="{{ $bgumum->luas_bg_negara_m2 }}"
                                    class="form-control @error('luas_bg_negara_m2') is-invalid @enderror">
                                @error('luas_bg_negara_m2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Dokumentasi</label>
                                <input type="text" name="dokumentasi" value="{{ $bgumum->dokumentasi }}"
                                    class="form-control @error('dokumentasi') is-invalid @enderror">
                                @error('dokumentasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No IMB</label>
                                <input type="text" name="no_imb" value="{{ $bgumum->no_imb }}"
                                    class="form-control @error('no_imb') is-invalid @enderror">
                                @error('no_imb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">File IMB</label>
                                <input type="text" name="file_imb" value="{{ $bgumum->file_imb }}"
                                    class="form-control @error('file_imb') is-invalid @enderror">
                                @error('file_imb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">No SLF</label>
                                <input type="text" name="no_slf" value="{{ $bgumum->no_slf }}"
                                    class="form-control @error('no_slf') is-invalid @enderror">
                                @error('no_slf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">File SLF</label>
                                <input type="text" name="file_slf" value="{{ $bgumum->file_slf }}"
                                    class="form-control @error('file_slf') is-invalid @enderror">
                                @error('file_slf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <button type="submit" name="save" class="btn btn-primary">Simpan </button>
                                    <a href="{{ route('bg_negara.index') }}" class="btn btn-danger">Batal</a>
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
