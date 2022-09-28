<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\Hsbgn;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

class HsbgnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Hsbgn::all();
        return view('transaksi.hsbgn.index', ['hsbgn' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::pluck('name','id');
        return view('transaksi.hsbgn.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hsbgn = new hsbgn;

        $hsbgn->thn_periode_keg = $request->thn_periode_keg;
        $hsbgn->province_id = $request->provinces;
        $hsbgn->id_kota = $request->regency;
        $hsbgn->created_by = Auth::user()->id;
        $hsbgn->save();
        
        $ketersediaanData = $request->dataadded;
        if ($ketersediaanData == 0) {
            $hsbgn->keterangan_verifikasi = "-";
            $hsbgn->detail_kd_prog = "-";
            $hsbgn->kd_struktur = "-";
            $hsbgn->tahun_penetapan = "-";
            $hsbgn->nama_kecamatan = "-";
            $hsbgn->angka_luas_wilayah = "-";
            $hsbgn->satuan_luas_wilayah	 = "-";
            $hsbgn->zona = "-";
            $hsbgn->bg_tidak_sederhana = "-";
            $hsbgn->bg_sederhana = "-";
            $hsbgn->rumahnegara_tipe_a = "-";
            $hsbgn->rumahnegara_tipe_b = "-";
            $hsbgn->rumahnegara_tipe_c_d_e = "-";
            $hsbgn->pagar_gedungnegara_depan = "-";
            $hsbgn->pagar_gedungnegara_samping = "-";
            $hsbgn->pagar_gedungnegara_belakang = "-";
            $hsbgn->pagar_rumahnegara_depan = "-";
            $hsbgn->pagar_rumahnegara_samping = "-";
            $hsbgn->pagar_rumahnegara_belakang = "-";
            $hsbgn->sk_penetapan = "-";
            $hsbgn->file_sk_penetapan_hsbgn = "-";
            $hsbgn->indeks_kemahalan_konstruksi = "-";
            $hsbgn->save();

            return redirect()->route('hsbgn.index')->with('success',"Data Berhasil Di Tambahkan!");

        } else {
            $id = hsbgn::orderBy('id', 'DESC')->pluck('id')->first();
            return redirect()->route('hsbgn.edit', $id);
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
        $hsbgn = Hsbgn::findOrFail($id);
        $province_id = $hsbgn->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.hsbgn.edit', compact('hsbgn', 'province', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hsbgn = Hsbgn::findOrFail($id);
        $province_id = $hsbgn->province_id;
        $province = Province::all();
        $city = Regency::where('province_id', $province_id)
                        ->get();

        return  view('transaksi.hsbgn.edit', compact('hsbgn', 'province', 'city'));
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
            'tahun_penetapan' => 'required',
            'nama_kecamatan' => 'required',
            'angka_luas_wilayah' => 'required',
            'satuan_luas_wilayah' => 'required',
            'zona' => 'required',
            'bg_tidak_sederhana' => 'required',
            'bg_sederhana' => 'required',
            'rumahnegara_tipe_a' => 'required',
            'rumahnegara_tipe_b' => 'required',
            'rumahnegara_tipe_c_d_e' => 'required',
            'pagar_gedungnegara_depan' => 'required',
            'pagar_gedungnegara_samping' => 'required',
            'pagar_gedungnegara_belakang' => 'required',
            'pagar_rumahnegara_depan' => 'required',
            'pagar_rumahnegara_samping' => 'required',
            'pagar_rumahnegara_belakang' => 'required',
            'sk_penetapan' => 'required',
            'file_sk_penetapan_hsbgn' => 'required',
            'indeks_kemahalan_konstruksi' => 'required',
        ]);

        $hsbgn = hsbgn::FindOrFail($id);
        $hsbgn->thn_periode_keg = $request->thn_periode_keg;
        $hsbgn->province_id = $request->provinces;
        $hsbgn->id_kota = $request->regency;
        $hsbgn->tahun_penetapan = $request->tahun_penetapan;
        $hsbgn->nama_kecamatan = $request->nama_kecamatan;
        $hsbgn->angka_luas_wilayah = $request->angka_luas_wilayah;
        $hsbgn->satuan_luas_wilayah = $request->satuan_luas_wilayah;
        $hsbgn->zona = $request->zona;
        $hsbgn->bg_tidak_sederhana = $request->bg_tidak_sederhana;
        $hsbgn->bg_sederhana = $request->bg_sederhana;
        $hsbgn->rumahnegara_tipe_a = $request->rumahnegara_tipe_a;
        $hsbgn->rumahnegara_tipe_b = $request->rumahnegara_tipe_b;
        $hsbgn->rumahnegara_tipe_c_d_e = $request->rumahnegara_tipe_c_d_e;
        $hsbgn->pagar_gedungnegara_depan = $request->pagar_gedungnegara_depan;
        $hsbgn->pagar_gedungnegara_samping = $request->pagar_gedungnegara_samping;
        $hsbgn->pagar_gedungnegara_belakang = $request->pagar_gedungnegara_belakang;
        $hsbgn->pagar_rumahnegara_depan = $request->pagar_rumahnegara_depan;
        $hsbgn->pagar_rumahnegara_samping = $request->pagar_rumahnegara_samping;
        $hsbgn->pagar_rumahnegara_belakang = $request->pagar_rumahnegara_belakang;
        $hsbgn->sk_penetapan = $request->sk_penetapan;
        $hsbgn->file_sk_penetapan_hsbgn = $request->file_sk_penetapan_hsbgn;
        $hsbgn->indeks_kemahalan_konstruksi = $request->indeks_kemahalan_konstruksi;
        
        $hsbgn->save();
        
        return redirect()->route('hsbgn.index')->with('success', 'Data Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Hsbgn::FindOrFail($id);
        $post->delete();
        return redirect()->route('hsbgn.index')->with('success',"Data Berhasil Di Hapus");
    }
}
