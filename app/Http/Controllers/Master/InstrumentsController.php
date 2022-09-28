<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instrument;

class InstrumentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Instrument::latest('created_at')->paginate(10);
        $dataCount = Instrument::count();
        return view('master.instrument.index')->with([
            'data' => $data,
            'dataCount' => $dataCount
        ]);
    }

    public function read()
    {
        $data = Instrument::latest('created_at')->paginate(10);
        return view('master.instrument.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('master.instrument.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_form'       => 'required|max:255',
            'path' => 'required|max:255',
          ]);

        $post = Instrument::updateOrCreate(['id' => $request->id], [
            'nama_form' => $request->nama_form,
            'path' => $request->path
          ]);

        return response()->json(['code'=>200, 'message'=>'Data Created successfully','data' => $post], 200);

    }

    public function show($id)
    {
        $data = Instrument::findOrFail($id);
        return view('master.instrument.edit')->with([
            'data'=>$data
        ]);
    }

    public function edit(Instrument $instrument)
    {
        //edit & show digabung
    }

    public function update(Request $request, $id)
    {
        $data = Instrument::findOrFail($id);
        $data->nama_form = $request->nama_form;
        $data->path = $request->path;
        $data->save();
    }

    public function destroy($id)
    {
        $data = Instrument::findOrFail($id);
        $data->delete();
    }
}
