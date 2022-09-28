<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\Bgh;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

class BghController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $a = Bgh::all();
        return view('transaksi.bgh.index', ['bgh' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::pluck('name','id');
        return view('transaksi.bgh.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bgh = new Bgh;

        $bgh->thn_periode_keg = $request->thn_periode_keg;
        $bgh->province_id = $request->provinces;
        $bgh->id_kota = $request->regency;
        $bgh->created_by = Auth::user()->id;
        $bgh->save();
        $ketersediaanData = $request->dataadded;
        if ($ketersediaanData == 0) {
            $bgh->keterangan_verifikasi = "-";
            $bgh->detail_kd_prog = "-";
            $bgh->kd_struktur = "-";
            $bgh->titik_koordinat_long = "0";
            $bgh->titik_koordinat_lat = "0";
            $bgh->file_upload_sertifikat_bgh = "-";
            $bgh->nama_kegiatan = "-";
            $bgh->thn_anggaran = "-";
            $bgh->sumber_anggaran = "-";
            $bgh->alokasi_anggaran = "-";
            $bgh->volume_pekerjaan = "-";
            $bgh->status_aset = "-";
            $bgh->instansi_unit_organisasi_pelaksana = "-";
            $bgh->lokasi_kegiatan_proyek = "-";
            $bgh->nama_kepala_dinas = "-";
            $bgh->nama_pengelola = "-";
            $bgh->nama_penyedia_jasa_perencanaan = "-";
            $bgh->thn_penerbitan_sertifikat_bgh = "-";
            $bgh->no_sertifikat_bgh = "-";
            $bgh->no_plakat_bgh = "-";
            $bgh->thn_penerbitan_sertifikat_pemanfaatan_bgh = "-";
            $bgh->peringkat_bgh = "-";
            $bgh->pemanfaatan_ke = "-";
            $bgh->save();

            return redirect()->route('bgh.index')->with('success',"Data Berhasil Di Tambahkan!");

        } else {
            $id = bgh::orderBy('id', 'DESC')->pluck('id')->first();
            return redirect()->route('bgh.edit', $id);
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
        $bgh = bgh::findOrFail($id);
        $province_id = $bgh->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.bgh.show', compact('bgh', 'province', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bgh = bgh::findOrFail($id);
        $province_id = $bgh->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.bgh.edit', compact('bgh', 'province', 'city'));
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
            'nama_kegiatan' => 'required',
            'thn_anggaran' => 'required',
            'sumber_anggaran' => 'required',
            'alokasi_anggaran' => 'required',
            'volume_pekerjaan' => 'required',
            'status_aset' => 'required',
            'instansi_unit_organisasi_pelaksana' => 'required',
            'lokasi_kegiatan_proyek' => 'required',
            'nama_kepala_dinas' => 'required',
            'nama_pengelola' => 'required',
            'nama_penyedia_jasa_perencanaan' => 'required',
            'thn_penerbitan_sertifikat_bgh' => 'required',
            'no_sertifikat_bgh' => 'required',
            'no_plakat_bgh' => 'required',
            'thn_penerbitan_sertifikat_pemanfaatan_bgh' => 'required',
            'peringkat_bgh' => 'required',
            'pemanfaatan_ke' => 'required',
        ]);

        $bgh = Bgh::FindOrFail($id);
        $bgh->thn_periode_keg = $request->thn_periode_keg;
        $bgh->province_id = $request->provinces;
        $bgh->id_kota= $request->regency;
        $bgh->nama_kegiatan = $request->nama_kegiatan;
        $bgh->thn_anggaran = $request->thn_anggaran;
        $bgh->sumber_anggaran = $request->sumber_anggaran;
        $bgh->alokasi_anggaran = $request->alokasi_anggaran;
        $bgh->volume_pekerjaan = $request->volume_pekerjaan;
        $bgh->status_aset = $request->status_aset;
        $bgh->instansi_unit_organisasi_pelaksana = $request->instansi_unit_organisasi_pelaksana;
        $bgh->lokasi_kegiatan_proyek = $request->lokasi_kegiatan_proyek;
        $bgh->nama_kepala_dinas = $request->nama_kepala_dinas;
        $bgh->nama_pengelola = $request->nama_pengelola;
        $bgh->nama_penyedia_jasa_perencanaan = $request->nama_penyedia_jasa_perencanaan;
        $bgh->thn_penerbitan_sertifikat_bgh = $request->thn_penerbitan_sertifikat_bgh;
        $bgh->no_sertifikat_bgh = $request->no_sertifikat_bgh;
        $bgh->no_plakat_bgh = $request->no_plakat_bgh;
        $bgh->thn_penerbitan_sertifikat_pemanfaatan_bgh = $request->thn_penerbitan_sertifikat_pemanfaatan_bgh;
        $bgh->peringkat_bgh = $request->peringkat_bgh;
        $bgh->pemanfaatan_ke = $request->pemanfaatan_ke;
        
        $bgh->save();
        
        return redirect()->route('bgh.index')->with('success', 'Data Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Bgh::FindOrFail($id);
        $post->delete();
        return redirect()->route('bgh.index')->with('success',"Data Berhasil Di Hapus");
    }
}
