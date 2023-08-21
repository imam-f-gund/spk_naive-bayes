<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Service\NaiveBayes;
use RealRashid\SweetAlert\Facades\Alert;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // if($request->data_training>$total = Kriteria::count()){

        //     Alert::error('Info', 'Inputan melebihi data training');
        //     return back();

        // }

        $naiv = new NaiveBayes;
        
        $dataResult = [];
        $tp = [];
        $tn = [];
        $fp = [];
        $fn = [];

        // // if(){
            $persentase = 100;
            if(!empty($request->data_training)){
                $persentase = $request->data_training;
            }

            $total_data =Kriteria::count()/100*$persentase;
            $data_training = Kriteria::limit((int) $total_data)->get();

            $total = Kriteria::count();
            $sisa_data = $total-(int) $total_data;
            $data_testing = Kriteria::limit($sisa_data)->get();
            $testing = $sisa_data;
        // // }
        // $persentase = $request->data_training;
        
        // $data_training = Kriteria::limit($request->data_training)->get();
        // $data_tes = Kriteria::limit(30)->get();
        // $total_data = Kriteria::count()+count($data_tes);
        // $sisa_data = $total_data-$request->data_training;
        // $data_testing = Kriteria::limit($sisa_data)->get();
        // $testing = $sisa_data;
        foreach ($data_testing as $key => $value) {

        $result = $naiv->Result($value->warna, $value->bau, $value->butir, $value->hama, $value->mutu);
        $resultDataTesting[] = $result;
        
        if($result['fakta'] == 'Berkualitas' && $result['result'] == 'Berkualitas' && $result['prediksi'] == 'Sesuai'){
            $tp[] = $result;
            }else if($result['fakta'] == 'Buruk' && $result['result'] == 'Buruk' && $result['prediksi'] == 'Sesuai'){
            $tn[] = $result;
            }else if($result['fakta'] == 'Berkualitas' && $result['result'] == 'Buruk' && $result['prediksi'] == 'Tidak Sesuai'){
            $fn[] = $result;
            } else if($result['fakta'] == 'Buruk' && $result['result'] == 'Berkualitas' && $result['prediksi'] == 'Tidak Sesuai'){
            $fn[] = $result;
            } 
        }

        $akurasi = (count($tp)+count($tn))/(count($tp)+count($fp)+count($fn)+count($tn))*100;
       
        return view('pages.performance',['type_menu'=>'performance'],compact('data_training','resultDataTesting','akurasi','persentase','testing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function uji_data(Request $request)
    {
        
        
        // $data_training = $request->data_training;
        // $data_testing = $kriteria;

    }
}
