<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
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
        $kriteria = Kriteria::limit(30)->get();
        $dataResult = [];

        foreach ($kriteria as $key => $value) {

            $result = $naiv->Result($value->warna, $value->bau, $value->butir, $value->hama, $value->mutu);
            $dataResult[] = $result;
        }

        return view('pages.analisa', compact('dataResult', 'type_menu'));
    }

    public function prediction(Request $request)
    {
        $naiv = new NaiveBayes;
        $result = $naiv->Result($request->warna, $request->bau, $request->butir, $request->hama, '');

        return response()->json($result);
    }

    public function export()
    {
        $naiv = new NaiveBayes;
        $kriteria = Kriteria::limit(30)->get();
        $dataResult = [];

        foreach ($kriteria as $key => $value) {
            $result = $naiv->Result($value->warna, $value->bau, $value->butir, $value->hama, $value->mutu);
            $dataResult[] = $result;
        }

        $pdf = Pdf::loadView('template.export', compact('dataResult'))->setPaper('a4', 'potrait');
        return $pdf->download('Data Analisa.pdf');
    }
}
