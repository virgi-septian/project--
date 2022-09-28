<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\BgNegara;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

class BgNegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = BgNegara::all();
        return view('transaksi.bg-negara.index', ['BgNegara' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::pluck('name','id');
        return view('transaksi.bg-negara.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bg_negara = new Bgnegara;

        $bg_negara->thn_periode_keg = $request->thn_periode_keg;
        $bg_negara->province_id = $request->provinces;
        $bg_negara->id_kota = $request->regency;
        $bg_negara->created_by = Auth::user()->id;
        $bg_negara->save();
        
        $ketersediaanData = $request->dataadded;
        if ($ketersediaanData == 0) {
            $bg_negara->nama_bg_negara = "-";
            $bg_negara->instansi_pemilik_bg_negara = "-";
            $bg_negara->alamat_bg_negara = "-";
            $bg_negara->luas_bg_negara_m2 = "-";
            $bg_negara->titik_koordinat_long = "0";
            $bg_negara->titik_koordinat_lat = "0";
            $bg_negara->dokumentasi = "-";
            $bg_negara->no_imb = "-";
            $bg_negara->file_imb = "-";
            $bg_negara->no_slf = "-";
            $bg_negara->file_slf = "-";
            $bg_negara->save();

            return redirect()->route('bg_negara.index')->with('success', 'Data Berhasil di tambahkan!');

        } else {
            $id = Bgnegara::orderBy('id', 'DESC')->pluck('id')->first();
            return redirect()->route('bg_negara.edit', $id);
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
        $bg_negara = bgnegara::findOrFail($id);
        $province_id = $bg_negara->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.bg-negara.show', compact('bg_negara', 'province', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bg_negara = bgnegara::findOrFail($id);
        $province_id = $bg_negara->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.bg-negara.show', compact('bg_negara', 'province', 'city'));
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
            'nama_bg_negara' => 'required',
            'instansi_pemilik_bg_negara' => 'required',
            'alamat_bg_negara' => 'required',
            'luas_bg_negara_m2' => 'required',
            'dokumentasi' => 'required',
            'no_imb' => 'required',
            'file_imb' => 'required',
            'no_slf' => 'required',
            'file_slf' => 'required',
            
        ]);

        $bg_negara = bgnegara::FindOrFail($id);
        $bg_negara->thn_periode_keg = $request->thn_periode_keg;
        $bg_negara->province_id = $request->provinces;
        $bg_negara->id_kota = $request->regency;
        $bg_negara->nama_bg_negara = $request->nama_bg_negara;
        $bg_negara->instansi_pemilik_bg_negara = $request->instansi_pemilik_bg_negara;
        $bg_negara->alamat_bg_negara = $request->alamat_bg_negara;
        $bg_negara->luas_bg_negara_m2 = $request->luas_bg_negara_m2;
        $bg_negara->dokumentasi = $request->dokumentasi;
        $bg_negara->no_imb = $request->no_imb;
        $bg_negara->file_imb = $request->file_imb;
        $bg_negara->no_slf = $request->no_slf;
        $bg_negara->file_slf = $request->file_slf;
        
        $bg_negara->save();
        
        return redirect()->route('bg_negara.index')->with('success', 'Data Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bg_negara = BgNegara::FindOrFail($id);
        $bg_negara->delete();
        return redirect()->route('bg_umum.index')->with('success',"Data Berhasil Di Hapus");
    }
}
