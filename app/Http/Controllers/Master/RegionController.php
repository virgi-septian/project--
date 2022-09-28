<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use DB;

class RegionController extends Controller
{
    function Province()
    {
     $provinces = Province::pluck('name', 'id');
     return view('asset.dropdown')->with('provinces', $provinces);
    }

    // function regency(Request $id)
    // {
    //     $regency = Regency::where('province_id', '=', '13')
    //         ->pluck('name', 'id');

    //     return response()->json($regency);
    // }


    public function GetdropDownList($id)
    {
        echo json_encode(Regency::where('province_id', $id)->orderBy('name', 'asc')->get());
    }


    function regency(Request $id)
    {
        $data = Regency::findOrFail($id)
            ->pluck('name', 'id');

        return response()->json($data);
        // return view('master.instrument.edit')->with([
        //     'data'=>$data
        // ]);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Regency::where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
}
