@extends('layouts.app')

@section('title', 'performance')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Performance</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Performance</h2>


                <div class="row">

                    <div class="col-sm-12 col-md-12">

                        <div class="card">
                            <div class="card-header">

                                <div class="col ">
                                    <form action="{{ url('performance') }}" method="GET">
                                        <div class="form-group">
                                            <label>Uji Akurasi</label>
                                            <div class="input-group">
                                                <select class="form-control" id="data_training" name="data_training">
                                                    <option selected value="">Persentase</option>
                                                    <option value="10">10%</option>
                                                    <option value="20">20%</option>
                                                    <option value="30">30%</option>
                                                    <option value="40">40%</option>
                                                    <option value="50">50%</option>
                                                    <option value="60">60%</option>
                                                    <option value="70">70%</option>
                                                    <option value="80">80%</option>
                                                    <option value="90">90%</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary float-right">Persentase</button>
                                        </div>
                                    </form>

                                    {{-- <button type="button" class="btn btn-primary float-right" id="modal-performance">
                                        Tambah performance
                                    </button> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="text-center">
                                        <tr>Data Training {{ $persentase }}% </tr>
                                    </div>
                                    <table class="table">
                                        <h5>DATA TRAINING</h5>
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Warna</th>
                                                <th>Bau</th>
                                                <th>Butir</th>
                                                <th>Hama</th>
                                                <th>Mutu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data_training as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data['warna'] }}</td>
                                                    <td>{{ $data['bau'] }}</td>
                                                    <td>{{ $data['butir'] }}</td>
                                                    <td>{{ $data['hama'] }}</td>
                                                    <td>{{ $data['mutu'] }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <h5>DATA TESTING</h5>
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Warna</th>
                                                <th>Bau</th>
                                                <th>Butir</th>
                                                <th>Hama</th>
                                                <th>Mutu</th>
                                                <th>Fakta</th>
                                                <th>Klasifikasi</th>
                                                <th>Prediksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($resultDataTesting as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data['warna'] }}</td>
                                                    <td>{{ $data['bau'] }}</td>
                                                    <td>{{ $data['butir'] }}</td>
                                                    <td>{{ $data['hama'] }}</td>
                                                    <td>{{ $data['mutu'] }}</td>
                                                    {{-- <td>{{ round($item['berkualitas'], 4) }}</td>
                                                    <td>{{ round($item['buruk'], 4) }}</td> --}}
                                                    <td>{{ $item['fakta'] }}</td>
                                                    <td>{{ $item['result'] }}</td>
                                                    <td>{{ $item['prediksi'] }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Akurasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ round($akurasi, 2) }}%</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>

        {{-- form modal performance --}}
        {{--
        <form class="modal-part" id="modal-performance-part" action="{{ url('performance') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Warna</label>
                <div class="input-group">
                    <select class="form-control" id="warna" name="warna">
                        <option selected value="">Pilih Warna</option>
                        <option value="Putih">Putih</option>
                        <option value="Kuning">Kuning</option>
                        <option value="Campur">Campur</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Bau</label>
                <div class="input-group">
                    <select class="form-control" id="bau" name="bau">
                        <option selected value="">Pilih Bau</option>
                        <option value="Normal">Normal</option>
                        <option value="Busuk">Busuk</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label>Butir</label>
                <div class="input-group">
                    <select class="form-control" id="butir" name="butir">
                        <option selected value="">Pilih Butir</option>
                        <option value="Baik">Baik</option>
                        <option value="Pecah">Pecah</option>
                        <option value="Rusak">Rusak</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label> Hama</label>
                <div class="input-group">
                    <select class="form-control" id="hama" name="hama">
                        <option selected value="">Pilih Hama</option>
                        <option value="Bebas">Bebas</option>
                        <option value="Terkena">Terkena</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label>Mutu</label>
                <div class="input-group">
                    <select class="form-control" id="mutu" name="mutu">
                        <option selected value="">Pilih Mutu</option>
                        <option value="berkualitas">Berkualitas</option>
                        <option value="buruk">Buruk</option>
                    </select>

                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('performance-uji') }}" method="GET">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group">
                                    <select class="form-control" id="warna-update" name="warna">
                                        <option selected value="">Pilih Warna</option>
                                        <option value="Putih">Putih</option>
                                        <option value="Kuning">Kuning</option>
                                        <option value="Campur">Campur</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Bau</label>
                                <div class="input-group">
                                    <select class="form-control" id="bau-update" name="bau">
                                        <option selected value="">Pilih Bau</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Busuk">Busuk</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Butir</label>
                                <div class="input-group">
                                    <select class="form-control" id="butir-update" name="butir">
                                        <option selected value="">Pilih Butir</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Pecah">Pecah</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label> Hama</label>
                                <div class="input-group">
                                    <select class="form-control" id="hama-update" name="hama">
                                        <option selected value="">Pilih Hama</option>
                                        <option value="Bebas">Bebas</option>
                                        <option value="Terkena">Terkena</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mutu</label>
                                <div class="input-group">
                                    <select class="form-control" id="mutu-update" name="mutu">
                                        <option selected value="">Pilih Mutu</option>
                                        <option value="berkualitas">Berkualitas</option>
                                        <option value="buruk">Buruk</option>
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <script>
        $("#modal-performance").fireModal({
            title: 'Tambah performance',
            body: $("#modal-performance-part"),
            footerClass: 'bg-whitesmoke',
            autoFocus: false,
            shown: function(modal, form) {
                console.log(form)

            },
        });

        function fungsiEdit(data) {
            var data = data.split('|');
            $('#exampleModal form').attr('action', "{{ url('performance') }}/" + data[1]);
            $('#warna-update').val(data[2]);
            $('#bau-update').val(data[3]);
            $('#butir-update').val(data[4]);
            $('#hama-update').val(data[5]);
            $('#mutu-update').val(data[6]);

        }
    </script>

    <!-- Page Specific JS File -->
@endpush
