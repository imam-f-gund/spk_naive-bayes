@extends('layouts.app')

@section('title', 'Analisa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Analisa</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h5 class="text-center">Cek Klasifikasi</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form id="form-prediksi">
                                            @csrf
                                            <div class="form-group">
                                                <label>Warna</label>
                                                <select class="form-control" id="warna" name="warna">
                                                    <option selected value="">Pilih Warna</option>
                                                    <option value="Putih">Putih</option>
                                                    <option value="Kuning">Kuning</option>
                                                    <option value="Hitam">Hitam</option>
                                                </select>
                                                <div class="invalid-feedback" id="errorWarna" style="display: none">
                                                    Warna harus diisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Bau</label>
                                                <select class="form-control" id="bau" name="bau">
                                                    <option selected value="">Pilih Bau</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Busuk">Busuk</option>
                                                </select>
                                                <div class="invalid-feedback" id="errorBau" style="display: none">
                                                    Bau harus diisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Butir</label>
                                                <select class="form-control" id="butir" name="butir">
                                                    <option selected value="">Pilih Butir</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Pecah">Pecah</option>
                                                    <option value="Rusak">Rusak</option>
                                                </select>
                                                <div class="invalid-feedback" id="errorButir" style="display: none">
                                                    Butir harus diisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Hama</label>
                                                <select class="form-control" id="hama" name="hama">
                                                    <option selected value="">Pilih Hama</option>
                                                    <option value="Bebas">Bebas</option>
                                                    <option value="Terkena">Terkena</option>
                                                </select>
                                                <div class="invalid-feedback" id="errorHama" style="display: none">
                                                    Hama harus diisi
                                                </div>
                                            </div>
                                            <div class=" float-right">
                                                <button type="button" class="btn btn-info mr-3" onclick="resetForm()"><i
                                                        class="fas fa-undo"></i> Reset</button>
                                                <button type="button" class="btn btn-primary my-3"
                                                    onclick="fungsiPrediksi()">
                                                    <i class="fa-solid fa-arrows-to-eye"></i> Cek
                                                    Hasil</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <hr />
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="card shadow rounded-lg">
                                            <div class="card-body text-center">
                                                <h4 style="color: #6777ef !important;">Hasil Klasifikasi</h4>
                                            </div>
                                            <hr />
                                            <div class="card-body">
                                                <h1 id="hasil-prediksi" style="display: none">
                                                    Berkualitas
                                                </h1>
                                                <h6 id="prediksi-kosong">
                                                    Silakan input kriteria diatas untuk melakukan klasifikasi
                                                </h6>
                                            </div>
                                            <hr />
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col">
                                                        <p>
                                                            <b>Nilai Berkualitas</b>
                                                        </p>
                                                        <p id="nilai-berkualitas">
                                                            0.0000
                                                        </p>
                                                    </div>
                                                    <div class="col">
                                                        <p>
                                                            <b>Nilai Buruk</b>
                                                        </p>
                                                        <p id="nilai-buruk">
                                                            0.0000
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h2 class="section-title my-auto">History Analisa</h2>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered table-md">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Warna</th>
                                            <th>Bau</th>
                                            <th>Butir</th>
                                            <th>Hama</th>
                                            <th>Berkualitas</th>
                                            <th>Buruk</th>
                                            <th>Prediksi</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="dataHistory">
                                        @if ($dataHistory->isEmpty())
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    Belum ada data, lakukan analisa terlebih dahulu
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($dataHistory as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->warna }}</td>
                                                <td>{{ $item->bau }}</td>
                                                <td>{{ $item->butir }}</td>
                                                <td>{{ $item->hama }}</td>
                                                <td>{{ round($item->nilai_berkualitas, 4) }}</td>
                                                <td>{{ round($item->nilai_buruk, 4) }}</td>
                                                <td>
                                                    @if ($item->klasifikasi == 'berkualitas')
                                                        <span class="badge badge-success">Berkualitas</span>
                                                    @else
                                                        <span class="badge badge-danger">Buruk</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                    <h2 class="section-title my-auto">Data Hasil Testing</h2>
                                </div>
                                <div class="col">
                                    <a href="{{ route('analisa.export') }}" class="btn btn-success float-right">
                                        <i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered table-md">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Berkualitas</th>
                                            <th>Buruk</th>
                                            <th>Fakta</th>
                                            <th>Klasifikasi</th>
                                            <th>Prediksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($dataResult as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ round($item['berkualitas'], 4) }}</td>
                                                <td>{{ round($item['buruk'], 4) }}</td>
                                                <td>{{ $item['fakta'] }}</td>
                                                <td>{{ $item['result'] }}</td>
                                                <td>{{ $item['prediksi'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>


@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <script>
        function fungsiPrediksi() {
            var form = new FormData($("#form-prediksi")[0]);
            let valid = true;

            if ($("#warna").val() == "") {
                $("#errorWarna").show();
                valid = false;
            } else {
                $("#errorWarna").hide();
            }

            if ($("#bau").val() == "") {
                $("#errorBau").show();
                valid = false;
            } else {
                $("#errorBau").hide();
            }

            if ($("#butir").val() == "") {
                $("#errorButir").show();
                valid = false;
            } else {
                $("#errorButir").hide();
            }

            if ($("#hama").val() == "") {
                $("#errorHama").show();
                valid = false;
            } else {
                $("#errorHama").hide();
            }

            if (!valid) {
                return false;
            }

            $.ajax({
                url: "{{ route('analisa.prediction') }}",
                type: "POST",
                data: form,
                processData: false,
                contentType: false,
                success: function(result) {
                    console.log(result);
                    $("#hasil-prediksi").show();
                    $("#prediksi-kosong").hide();
                    $("#hasil-prediksi").html(result.result);
                    $("#nilai-berkualitas").html(result.nilai_berkualitas.toFixed(4));
                    $("#nilai-buruk").html(result.nilai_buruk.toFixed(4));

                    if (result.result == "Berkualitas") {
                        $("#hasil-prediksi").css("color", "#00f2c3");
                    } else {
                        $("#hasil-prediksi").css("color", "#f5365c");
                    }

                    if (result.table_history.length > 0) {
                        $("#dataHistory").html("");

                        $.each(result.table_history, function(index, value) {
                            console.log(value.nilai_berkualitas);
                            let nilai_berkualitas, nilai_buruk, klasifikasi;
                            if (Number(value.nilai_berkualitas) > 0) {
                                nilai_berkualitas = Number(value.nilai_berkualitas).toFixed(4);
                            } else {
                                nilai_berkualitas = '0.0000';
                            }

                            if (Number(value.nilai_buruk) > 0) {
                                nilai_buruk = Number(value.nilai_buruk).toFixed(4);
                            } else {
                                nilai_buruk = '0.0000';
                            }

                            if (value.klasifikasi == 'berkualitas') {
                                klasifikasi = `<span class="badge badge-success">Berkualitas</span>`;
                            } else {
                                klasifikasi = `<span class="badge badge-danger">Buruk</span>`;
                            }

                            $("#dataHistory").append(
                                "<tr>" +
                                "<td>" + (index + 1) + "</td>" +
                                "<td>" + value.warna + "</td>" +
                                "<td>" + value.bau + "</td>" +
                                "<td>" + value.butir + "</td>" +
                                "<td>" + value.hama + "</td>" +
                                "<td>" + nilai_berkualitas + "</td>" +
                                "<td>" + nilai_buruk + "</td>" +
                                "<td>" + klasifikasi + "</td>" +
                                "</tr>"
                            );
                        });
                    } else {
                        $("#dataHistory").html(
                            "<tr>" +
                            "<td colspan='8' class='text-center'>Belum ada data, lakukan analisa terlebih dahulu </td>" +
                            "</tr>"
                        );
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function resetForm() {
            $("#hasil-prediksi").hide();
            $("#prediksi-kosong").show();
            $("#hasil-prediksi").html("Berkualitas");
            $("#nilai-berkualitas").html("0.0000");
            $("#nilai-buruk").html("0.0000");
            $("#form-prediksi")[0].reset();
            $('#errorWarna').hide();
            $('#errorBau').hide();
            $('#errorButir').hide();
            $('#errorHama').hide();
        }
    </script>

    <!-- Page Specific JS File -->
@endpush
