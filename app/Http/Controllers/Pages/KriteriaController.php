<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Service\NaiveBayes;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $naiv = new NaiveBayes;
        $data = $naiv->Probabilitas();
        $warna = $data['warna'];
        $bau = $data['bau'];
        $butir = $data['butir'];
        $hama = $data['hama'];
        // dd($warna);
        $kriteria = Kriteria::all();
        return view('pages.kriteria',['type_menu' => 'kriteria'],compact('kriteria','warna','bau','butir','hama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [ 
            'warna'=>'required',
            'bau'=>'required',
            'butir'=>'required',
            'hama'=>'required',
            'mutu'=>'required',
        ]);

        if ($validator->fails()) {
          
            Alert::error('Gagal', 'Data Gagal Ditambahkan'.$validator->errors());
            return back();
        }

        Kriteria::create($request->all());

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kriteria');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        $validator = Validator::make($request->all(), [ 
            'warna'=>'required',
            'bau'=>'required',
            'butir'=>'required',
            'hama'=>'required',
            'mutu'=>'required',
        ]);

        if ($validator->fails()) {
          
            Alert::error('Gagal', 'Data Gagal Diubah'.$validator->errors());
            return back();
        }
        $kriteria=Kriteria::find($id);
        $kriteria->update($request->all());

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('kriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kriteria::find($id);

        Alert::success('Berhasil', 'Data Berhasil Didapus');
        return redirect()->route('kriteria');
    }
}
