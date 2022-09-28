@extends('layouts.admin')

@section('content')

    <div class="row">
        @include('layouts/_flash')
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Bangunan Gedung Hijau
                </div>
                <form action="{{route('bgh.store')}}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="col-md-12 form-group p-2">
            <label for="validationCustom01" class="form-label @error('thn_periode_keg') is-invalid @enderror"
            name="thn_periode_keg">Tahun Periode Kegiatan</label>
            <div class="form-group">
                    @php
                        for ($i=date('Y'); $i >= 2015; $i--) {
                            $thn[$i] = $i;
                        }
                    @endphp
                    {!! Form::select('thn_periode_keg', $thn,
                    null, ['class' => 'form-select', 'required', 'placeholder' => 'Pilih Tahun Kegiatan']) !!}
                </div>
                @error('thn_periode_keg')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="col-md-12 form-group p-2">
                <label for="validationCustom01" class="form-label"
                name="provinces">Pilih Propinsi</label>
                <div class="form-group">
                    {!! Form::select('provinces', $province ,
                    null, [ 'id'=> 'provinces' , 'class' => 'form-select', 'required', 'placeholder' => 'Pilih Propinsi' ]) !!}
                </div>
                @error('provinces')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 form-group p-2">
                <label for="validationCustom01" class="form-label @error('regency') is-invalid @enderror"
                name="regency">Pilih Kabupaten/Kota</label>
                <div class="form-group">
                    {!! Form::select('regency', [],
                    null, [ 'id' => 'regency' ,'class' => 'form-select', 'required', 'placeholder' => 'Pilih Kota']) !!}
                </div>
                @error('regency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 form-group p-3">
                <label class="control-label col-lg-12">Apakah ada data yang akan di inputkan ?</label>

                <div class="col-md-8 float-right">
                    <button class="btn btn-primary p-2" name="dataadded" type="submit" onclick="storeConfirm()" value="1">Ya, ada data</button>
                    <button class="btn btn-danger p-2" name="dataadded" type="submit" onclick="storeConfirm()" value="0">Tidak ada data</button>
                    <a href="{{ route('bgh.index') }}" class="btn btn-danger p-2 ms-5">Batal</a>
                </div>
            </div>
        </div>

                </form>
            </div>
        </div>
    </div>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#provinces').on('change', function(){
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
