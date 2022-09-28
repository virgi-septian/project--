<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\BgUmum;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
class BgUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = BgUmum::all();
        return view('transaksi.bg-umum.index', ['BgUmum' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::pluck('name','id');
        return view('transaksi.bg-umum.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bgUmum = new BgUmum;

        $bgUmum->thn_periode_keg = $request->thn_periode_keg;
        $bgUmum->province_id = $request->provinces;
        $bgUmum->id_kota = $request->regency;
        $bgUmum->created_by = Auth::user()->id;
        $bgUmum->save();
        
        $ketersediaanData = $request->dataadded;
        if ($ketersediaanData == 0) {
            $bgUmum->nama_kecamatan = "-";
            $bgUmum->nama_kelurahan = "-";
            $bgUmum->rt = "-";
            $bgUmum->rw = "-";
            $bgUmum->no_rumah = "-";
            $bgUmum->nama_pemilik_bangunan = "-";
            $bgUmum->no_ktp_pemilik_bangunan	 = "-";
            $bgUmum->alamat_bangunan = "-";
            $bgUmum->fungsi_bangunan = "-";
            $bgUmum->kepemilikan = "-";
            $bgUmum->titik_koordinat_long = "0";
            $bgUmum->titik_koordinat_lat = "0";
            $bgUmum->memiliki_imb = "-";
            $bgUmum->no_imb = "-";
            $bgUmum->memiliki_slf = "-";
            $bgUmum->no_slf = "-";
            $bgUmum->tingkat_kompleksitas = "-";
            $bgUmum->tingkat_permanensi = "-";
            $bgUmum->tingkat_risiko_kebakaran = "-";
            $bgUmum->zona_gempa = "-";
            $bgUmum->kategori_lokasi = "-";
            $bgUmum->kategori_ketinggian = "-";
            $bgUmum->save();

            return redirect()->route('bg_umum.index')->with('success', 'Data Berhasil di tambahkan!');

        } else {
            $id = BgUmum::orderBy('id', 'DESC')->pluck('id')->first();
            return redirect()->route('bg_umum.edit', $id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bgumum = bgumum::findOrFail($id);
        $province_id = $bgumum->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.bg-umum.show', compact('bgumum', 'province', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bgumum = bgumum::findOrFail($id);
        $province_id = $bgumum->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.bg-umum.edit', compact('bgumum', 'province', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'thn_periode_keg' => 'required',
            'provinces' => 'required',
            'regency' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kelurahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'no_rumah' => 'required',
            'nama_pemilik_bangunan' => 'required',
            'no_ktp_pemilik_bangunan' => 'required',
            'alamat_bangunan' => 'required',
            'fungsi_bangunan' => 'required',
            'kepemilikan' => 'required',
            'memiliki_imb' => 'required',
            'no_imb' => 'required',
            'memiliki_slf' => 'required',
            'no_slf' => 'required',
            'tingkat_kompleksitas' => 'required',
            'tingkat_permanensi' => 'required',
            'tingkat_risiko_kebakaran' => 'required',
            'zona_gempa' => 'required',
            'kategori_lokasi' => 'required',
            'kategori_ketinggian' => 'required',
        ]);

        $bgumum = bgumum::FindOrFail($id);
        $bgumum->thn_periode_keg = $request->thn_periode_keg;
        $bgumum->province_id = $request->provinces;
        $bgumum->id_kota = $request->regency;
        $bgumum->nama_kecamatan = $request->nama_kecamatan;
        $bgumum->nama_kelurahan = $request->nama_kelurahan;
        $bgumum->rt = $request->rt;
        $bgumum->rw = $request->rw;
        $bgumum->nama_pemilik_bangunan = $request->nama_pemilik_bangunan;
        $bgumum->no_ktp_pemilik_bangunan = $request->no_ktp_pemilik_bangunan;
        $bgumum->alamat_bangunan = $request->alamat_bangunan;
        $bgumum->fungsi_bangunan = $request->fungsi_bangunan;
        $bgumum->kepemilikan = $request->kepemilikan;
        $bgumum->memiliki_imb = $request->memiliki_imb;
        $bgumum->no_imb = $request->no_imb;
        $bgumum->memiliki_slf = $request->memiliki_slf;
        $bgumum->no_slf = $request->no_slf;
        $bgumum->tingkat_kompleksitas = $request->tingkat_kompleksitas;
        $bgumum->tingkat_permanensi = $request->tingkat_permanensi;
        $bgumum->tingkat_risiko_kebakaran = $request->tingkat_risiko_kebakaran;
        $bgumum->zona_gempa = $request->zona_gempa;
        $bgumum->kategori_ketinggian = $request->kategori_ketinggian;
        
        $bgumum->save();
        
        return redirect()->route('bg_umum.index')->with('success', 'Data Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BgUmum::FindOrFail($id);
        $post->delete();
        return redirect()->route('bg_umum.index')->with('success',"Data Berhasil Di Hapus");
    }
}
