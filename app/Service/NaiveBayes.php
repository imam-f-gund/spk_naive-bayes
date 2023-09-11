<?php

namespace App\Service;

use App\Models\Kriteria;

class NaiveBayes
{

    public function Probabilitas()
    {
        $datawarna = [];
        $databau = [];
        $databutir = [];
        $datahama = [];

        $kriteria = Kriteria::all();

        foreach ($kriteria as $key => $value) {
            if ($value->mutu == 'berkualitas') {
                $data[] = [
                    'id' => $value->id,
                    'status' => 'berkualitas',
                ];
            }
            if ($value->mutu == 'buruk') {
                $data[] = [
                    'id' => $value->id,
                    'status' => 'buruk',
                ];
            }

            // warna
            if ($value->warna == 'Kuning' && $value->mutu == 'berkualitas') {
                $datawarna[] = [
                    'name' => 'warna',
                    'id' => $value->id,
                    'status' => 'kuning_berkualitas',
                ];
            }
            if ($value->warna == 'Putih' && $value->mutu == 'berkualitas') {
                $datawarna[] = [
                    'name' => 'warna',
                    'id' => $value->id,
                    'status' => 'putih_berkualitas',
                ];
            }
            if ($value->warna == 'Hitam' && $value->mutu == 'berkualitas') {
                $datawarna[] = [
                    'name' => 'warna',
                    'id' => $value->id,
                    'status' => 'campuran_berkualitas',
                ];
            }

            if ($value->warna == 'Kuning' && $value->mutu == 'buruk') {
                $datawarna[] = [
                    'name' => 'warna',
                    'id' => $value->id,
                    'status' => 'kuning_buruk',
                ];
            }
            if ($value->warna == 'Putih' && $value->mutu == 'buruk') {
                $datawarna[] = [
                    'name' => 'warna',
                    'id' => $value->id,
                    'status' => 'putih_buruk',
                ];
            }
            if ($value->warna == 'Hitam' && $value->mutu == 'buruk') {
                $datawarna[] = [
                    'name' => 'warna',
                    'id' => $value->id,
                    'status' => 'campuran_buruk',
                ];
            }

            //Bau
            if ($value->bau == 'Normal' && $value->mutu == 'berkualitas') {
                $databau[] = [
                    'name' => 'bau',
                    'id' => $value->id,
                    'status' => 'normal_berkualitas',
                ];
            }
            if ($value->bau == 'Busuk' && $value->mutu == 'berkualitas') {
                $databau[] = [
                    'name' => 'bau',
                    'id' => $value->id,
                    'status' => 'busuk_berkualitas',
                ];
            }
            if ($value->bau == 'Normal' && $value->mutu == 'buruk') {
                $databau[] = [
                    'name' => 'bau',
                    'id' => $value->id,
                    'status' => 'normal_buruk',
                ];
            }
            if ($value->bau == 'Busuk' && $value->mutu == 'buruk') {
                $databau[] = [
                    'name' => 'bau',
                    'id' => $value->id,
                    'status' => 'busuk_buruk',
                ];
            }

            //Butir
            if ($value->butir == 'Baik' && $value->mutu == 'berkualitas') {
                $databutir[] = [
                    'name' => 'butir',
                    'id' => $value->id,
                    'status' => 'baik_berkualitas',
                ];
            }
            if ($value->butir == 'Pecah' && $value->mutu == 'berkualitas') {
                $databutir[] = [
                    'name' => 'butir',
                    'id' => $value->id,
                    'status' => 'pecah_berkualitas',
                ];
            }
            if ($value->butir == 'Rusak' && $value->mutu == 'berkualitas') {
                $databutir[] = [
                    'name' => 'butir',
                    'id' => $value->id,
                    'status' => 'rusak_berkualitas',
                ];
            }
            if ($value->butir == 'Baik' && $value->mutu == 'buruk') {
                $databutir[] = [
                    'name' => 'butir',
                    'id' => $value->id,
                    'status' => 'baik_buruk',
                ];
            }
            if ($value->butir == 'Pecah' && $value->mutu == 'buruk') {
                $databutir[] = [
                    'name' => 'butir',
                    'id' => $value->id,
                    'status' => 'pecah_buruk',
                ];
            }
            if ($value->butir == 'Rusak' && $value->mutu == 'buruk') {
                $databutir[] = [
                    'name' => 'butir',
                    'id' => $value->id,
                    'status' => 'rusak_buruk',
                ];
            }

            // Hama
            if ($value->hama == 'Bebas' && $value->mutu == 'berkualitas') {
                $datahama[] = [
                    'name' => 'hama',
                    'id' => $value->id,
                    'status' => 'bebas_berkualitas',
                ];
            }
            if ($value->hama == 'Terkena' && $value->mutu == 'berkualitas') {
                $datahama[] = [
                    'name' => 'hama',
                    'id' => $value->id,
                    'status' => 'terkena_berkualitas',
                ];
            }
            if ($value->hama == 'Bebas' && $value->mutu == 'buruk') {
                $datahama[] = [
                    'name' => 'hama',
                    'id' => $value->id,
                    'status' => 'bebas_buruk',
                ];
            }
            if ($value->hama == 'Terkena' && $value->mutu == 'buruk') {
                $datahama[] = [
                    'name' => 'hama',
                    'id' => $value->id,
                    'status' => 'terkena_buruk',
                ];
            }
        }

        $cek = $this->CekKualitas($data, $datawarna, $databau, $databutir, $datahama);

        return $cek;
    }

    public function CekKualitas($data, $datawarna, $databau, $databutir, $datahama)
    {

        //kualitas
        $totalberkualitas = $this->CountData($data, 'berkualitas');
        $totalburuk = $this->CountData($data, 'buruk');
       
        //warna
        $totalwarna_kuning_berkualitas = $this->CountData($datawarna, 'kuning_berkualitas');
        $totalwarna_putih_berkualitas = $this->CountData($datawarna, 'putih_berkualitas');
        $totalwarna_campuran_berkualitas = $this->CountData($datawarna, 'campuran_berkualitas');
        $totalwarna_kuning_buruk = $this->CountData($datawarna, 'kuning_buruk');
        $totalwarna_putih_buruk = $this->CountData($datawarna, 'putih_buruk');
        $totalwarna_campuran_buruk = $this->CountData($datawarna, 'campuran_buruk');
        $warna1 = $this->Warna('kuning', (int) $totalwarna_kuning_berkualitas / (int) $totalberkualitas, (int) $totalwarna_kuning_buruk / (int) $totalburuk);
        $warna2 = $this->Warna('putih', (int) $totalwarna_putih_berkualitas / (int) $totalberkualitas, (int) $totalwarna_putih_buruk / (int) $totalburuk);
        $warna3 = $this->Warna('hitam', (int) $totalwarna_campuran_berkualitas / (int) $totalberkualitas, (int) $totalwarna_campuran_buruk / (int) $totalburuk);
      
        //bau
        $totalbau_normal_berkualitas = $this->CountData($databau, 'normal_berkualitas');
        $totalbau_busuk_berkualitas = $this->CountData($databau, 'busuk_berkualitas');
        $totalbau_normal_buruk = $this->CountData($databau, 'normal_buruk');
        $totalbau_busuk_buruk = $this->CountData($databau, 'busuk_buruk');

        $bau1 = $this->Bau('normal', (int) $totalbau_normal_berkualitas / (int) $totalberkualitas, (int) $totalbau_normal_buruk / (int) $totalburuk);
        $bau2 = $this->Bau('busuk', (int) $totalbau_busuk_berkualitas / (int) $totalberkualitas, (int) $totalbau_busuk_buruk / (int) $totalburuk);

        //butir
        $totalbutir_baik_berkualitas = $this->CountData($databutir, 'baik_berkualitas');
        $totalbutir_pecah_berkualitas = $this->CountData($databutir, 'pecah_berkualitas');
        $totalbutir_rusak_berkualitas = $this->CountData($databutir, 'rusak_berkualitas');
        $totalbutir_baik_buruk = $this->CountData($databutir, 'baik_buruk');
        $totalbutir_pecah_buruk = $this->CountData($databutir, 'pecah_buruk');
        $totalbutir_rusak_buruk = $this->CountData($databutir, 'rusak_buruk');
        $butir1 = $this->Butir('baik', (int) $totalbutir_baik_berkualitas / (int) $totalberkualitas, (int) $totalbutir_baik_buruk / (int) $totalburuk);
        $butir2 = $this->Butir('pecah', (int) $totalbutir_pecah_berkualitas / (int) $totalberkualitas, (int) $totalbutir_pecah_buruk / (int) $totalburuk);
        $butir3 = $this->Butir('rusak', (int) $totalbutir_rusak_berkualitas / (int) $totalberkualitas, (int) $totalbutir_rusak_buruk / (int) $totalburuk);

        //hama
        $totalhama_bebas_berkualitas = $this->CountData($datahama, 'bebas_berkualitas');
        $totalhama_terkena_berkualitas = $this->CountData($datahama, 'terkena_berkualitas');
        $totalhama_bebas_buruk = $this->CountData($datahama, 'bebas_buruk');
        $totalhama_terkena_buruk = $this->CountData($datahama, 'terkena_buruk');

        $hama1 = $this->Hama('bebas', (int) $totalhama_bebas_berkualitas / (int) $totalberkualitas, (int) $totalhama_bebas_buruk / (int) $totalburuk);
        $hama2 = $this->Hama('terkena', (int) $totalhama_terkena_berkualitas / (int) $totalberkualitas, (int) $totalhama_terkena_buruk / (int) $totalburuk);

        $probabilitas_berkualitas = $totalberkualitas/count($data);
        $probabilitas_buruk = $totalburuk/count($data);

        $result['warna'] = [
            $warna1,
            $warna2,
            $warna3,
        ];
        $result['bau'] = [
            $bau1,
            $bau2,
        ];
        $result['butir'] = [
            $butir1,
            $butir2,
            $butir3,
        ];
        $result['hama'] = [
            $hama1,
            $hama2,
        ];
        $result['probabilitas'] = [
            'berkualitas'=>number_format($probabilitas_berkualitas, 4, '.', '.'),
            'buruk'=>number_format($probabilitas_buruk, 4, '.', '.')
        ];

        return $result;

    }

    public function CountData($array, $find)
    {

        $data = [];
        foreach ($array as $key => $value) {

            if ($value['status'] == $find) {
                $data[] = [
                    'status' => $find,
                    'total' => count($value),
                ];
            }

        }
    
        return count($data);
    }

    public function Warna($warna, $total_nilai, $total_nilai_buruk)
    {
        $data = [];

        $data = [
            'warna' => $warna,
            'standart_berkualitas' => number_format($total_nilai, 4, '.', '.'),
            'standart_buruk' => number_format($total_nilai_buruk, 4, '.', '.'),
        ];

        return $data;
    }

    public function Bau($bau, $total_nilai, $total_nilai_buruk)
    {
        $data = [];

        $data = [
            'bau' => $bau,
            'standart_berkualitas' => number_format($total_nilai, 4, '.', '.'),
            'standart_buruk' => number_format($total_nilai_buruk, 4, '.', '.'),
        ];

        return $data;
    }

    public function Butir($butir, $total_nilai, $total_nilai_buruk)
    {
        $data = [];

        $data = [
            'butir' => $butir,
            'standart_berkualitas' => number_format($total_nilai, 4, '.', '.'),
            'standart_buruk' => number_format($total_nilai_buruk, 4, '.', '.'),
        ];

        return $data;
    }

    public function Hama($hama, $total_nilai, $total_nilai_buruk)
    {
        $data = [];

        $data = [
            'hama' => $hama,
            'standart_berkualitas' => number_format($total_nilai, 4, '.', '.'),
            'standart_buruk' => number_format($total_nilai_buruk, 4, '.', '.'),
        ];

        return $data;
    }

    public function Result($warna, $bau, $butir, $hama, $fakta)
    {
        $probabilitas = $this->Probabilitas();
        // warna
        $warna = strtolower($warna);
        if ($warna == 'Hitam') {
            $warna = 'hitam';
        }
        $warnaResult = array_filter($probabilitas['warna'], function ($var) use ($warna) {
            return ($var['warna'] == $warna);
        });
        $warnaResult = array_values($warnaResult);
        if (empty($warnaResult)) {
            $warnaResult = [
                [
                    'warna' => $warna,
                    'standart_berkualitas' => 0,
                    'standart_buruk' => 0,
                ],
            ];
        }

        // bau
        $bau = strtolower($bau);
        $bauResult = array_filter($probabilitas['bau'], function ($var) use ($bau) {
            return ($var['bau'] == $bau);
        });
        $bauResult = array_values($bauResult);
        if (empty($bauResult)) {
            $bauResult = [
                [
                    'bau' => $bau,
                    'standart_berkualitas' => 0,
                    'standart_buruk' => 0,
                ],
            ];
        }

        // butir
        $butir = strtolower($butir);
        $butirResult = array_filter($probabilitas['butir'], function ($var) use ($butir) {
            return ($var['butir'] == $butir);
        });
        $butirResult = array_values($butirResult);
        if (empty($butirResult)) {
            $butirResult = [
                [
                    'butir' => $butir,
                    'standart_berkualitas' => 0,
                    'standart_buruk' => 0,
                ],
            ];
        }

        // hama
        $hama = strtolower($hama);
        $hamaResult = array_filter($probabilitas['hama'], function ($var) use ($hama) {
            return ($var['hama'] == $hama);
        });
        $hamaResult = array_values($hamaResult);
        if (empty($hamaResult)) {
            $hamaResult = [
                [
                    'hama' => $hama,
                    'standart_berkualitas' => 0,
                    'standart_buruk' => 0,
                ],
            ];
        }

        $berkualitas = $warnaResult[0]['standart_berkualitas'] * $bauResult[0]['standart_berkualitas'] * $butirResult[0]['standart_berkualitas'] * $hamaResult[0]['standart_berkualitas'];
        $buruk = $warnaResult[0]['standart_buruk'] * $bauResult[0]['standart_buruk'] * $butirResult[0]['standart_buruk'] * $hamaResult[0]['standart_buruk'];

        if ($berkualitas > $buruk) {
            $result = 'berkualitas';
        } else {
            $result = 'buruk';
        }

        $data = [
            'warna' => ucfirst($warna),
            'bau' => ucfirst($bau),
            'butir' => ucfirst($butir),
            'hama' => ucfirst($hama),
            'fakta' => ucfirst($fakta),
            'berkualitas' => $berkualitas*$probabilitas['probabilitas']['berkualitas'],
            'buruk' => $buruk*$probabilitas['probabilitas']['buruk'],
            'result' => ucfirst($result),
            'prediksi' => $result == $fakta ? 'Sesuai' : 'Tidak Sesuai',
        ];
      
        return $data;
    }
}
