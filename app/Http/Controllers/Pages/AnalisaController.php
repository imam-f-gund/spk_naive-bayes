<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Analisa;
use App\Models\HistoryAnalisa;
use App\Models\Kriteria;
use App\Service\NaiveBayes;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AnalisaController extends Controller
{
    public function index()
    {
        $type_menu = 'analisa';
        $naiv = new NaiveBayes;
        $kriteria = Kriteria::all();
        $dataResult = [];
        $dataHistory = HistoryAnalisa::orderBy('id', 'desc')->get();

        foreach ($kriteria as $key => $value) {

            $result = $naiv->Result($value->warna, $value->bau, $value->butir, $value->hama, $value->mutu);
            $dataResult[] = $result;

            Analisa::updateOrCreate(
                ['kriteria_id' => $value->id],
                [
                    'warna' => $value->warna,
                    'bau' => $value->bau,
                    'butir' => $value->butir,
                    'hama' => $value->hama,
                    'mutu' => $value->mutu,
                    'berkualitas' => $result['berkualitas'],
                    'buruk' => $result['buruk'],
                    'klasifikasi' => $result['result'],
                    'prediksi' => strtolower($result['prediksi']),
                ]
            );
        }

        return view('pages.analisa', compact('dataResult', 'type_menu', 'dataHistory'));
    }

    public function prediction(Request $request)
    {
        $naiv = new NaiveBayes;
        $result = $naiv->Result($request->warna, $request->bau, $request->butir, $request->hama, '');

        $history = new HistoryAnalisa;
        $history->warna = $request->warna;
        $history->bau = $request->bau;
        $history->butir = $request->butir;
        $history->hama = $request->hama;
        $history->nilai_berkualitas = $result['berkualitas'];
        $history->nilai_buruk = $result['buruk'];
        $history->klasifikasi = $result['result'];
        $history->save();

        $data = [
            'result' => $result['result'],
            'nilai_berkualitas' => $result['berkualitas'],
            'nilai_buruk' => $result['buruk'],
            'table_history' => HistoryAnalisa::orderBy('id', 'desc')->get(),
        ];

        return response()->json($data);
    }

    public function export()
    {
        $naiv = new NaiveBayes;
        $kriteria = Kriteria::all();
        $dataResult = [];

        foreach ($kriteria as $key => $value) {
            $result = $naiv->Result($value->warna, $value->bau, $value->butir, $value->hama, $value->mutu);
            $dataResult[] = $result;
        }

        $pdf = Pdf::loadView('template.export', compact('dataResult'))->setPaper('a4', 'potrait');
        return $pdf->download('Data Analisa.pdf');
    }
}
