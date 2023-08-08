<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Service\NaiveBayes;

class AnalisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $naiv = new NaiveBayes;
      $dataKriteria = [];
      $kriteria = Kriteria::all();

      $data = $naiv->Probabilitas();
      $warna = $data['warna'];
    
      $bau = $data['bau'];
      $butir = $data['butir'];
      $hama = $data['hama'];

      foreach ($kriteria as $key => $value) {

         //array find
      

       $dataKriteria[]=[
        'warna'=>$value->warna,
        'bau'=>$value->bau,
        'butir'=>$value->butir,
        'hama'=>$value->hama,
        'mutu'=>$value->mutu,
       ];
       
      }

      // $arr = array_filter($dataKriteria, function ($var) use ($warna) {
       
      //   foreach ($warna as $key => $value) {
      //     return ($var['warna'] == $value['warna']);
      //   }
       
      // });
       
      //   dd($arr);
      // return $naiv->Result($warna, $bau, $butir, $hama, $fakta);
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
    }

}
