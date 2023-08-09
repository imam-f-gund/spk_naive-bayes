@extends('layouts.app')

@section('title', 'Kriteria')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kriteria</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Kriteria</h2>


                <div class="row">

                    <div class="col-sm-8 col-md-8">

                        <div class="card">
                            <div class="card-header">

                                <div class="col">
                                    <button type="button" class="btn btn-primary float-right" id="modal-kriteria">
                                        Tambah kriteria
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Warna</th>
                                                <th>Bau</th>
                                                <th>Butir</th>
                                                <th>Hama</th>
                                                <th>Mutu</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($kriteria as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data['warna'] }}</td>
                                                    <td>{{ $data['bau'] }}</td>
                                                    <td>{{ $data['butir'] }}</td>
                                                    <td>{{ $data['hama'] }}</td>
                                                    <td>{{ $data['mutu'] }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            id="modal-kriteria-ubah" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            onclick="fungsiEdit('{{ 'modal-kriteria-ubah' }}|{{ $data['id'] }}|{{ $data['warna'] }}|{{ $data['bau'] }}|{{ $data['butir'] }}|{{ $data['hama'] }}|{{ $data['mutu'] }}|')">
                                                            Ubah
                                                        </button>

                                                        <form action="{{ url('kriteria/' . $data['id']) }}"
                                                            class="d-inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">

                                <div class="col">
                                    <h5 class="title">Probabilitas Warna</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Warna</th>
                                                <th>Berkualitas</th>
                                                <th>Buruk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($warna as $item)
                                                <tr>
                                                    <td>{{ $item['warna'] }}</td>
                                                    <td>{{ $item['standart_berkualitas'] }}</td>
                                                    <td>{{ $item['standart_buruk'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">

                                    <div class="col">
                                        <h5 class="title">Probabilitas Bau</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Bau</th>
                                                    <th>Berkualitas</th>
                                                    <th>Buruk</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($bau as $item)
                                                    <tr>
                                                        <td>{{ $item['bau'] }}</td>
                                                        <td>{{ $item['standart_berkualitas'] }}</td>
                                                        <td>{{ $item['standart_buruk'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <div class="col">
                                            <h5 class="title">Probabilitas Butir</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Butir</th>
                                                        <th>Berkualitas</th>
                                                        <th>Buruk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($butir as $item)
                                                        <tr>
                                                            <td>{{ $item['butir'] }}</td>
                                                            <td>{{ $item['standart_berkualitas'] }}</td>
                                                            <td>{{ $item['standart_buruk'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="col">
                                                <h5 class="title">Probabilitas Hama</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Hama</th>
                                                            <th>Berkualitas</th>
                                                            <th>Buruk</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($hama as $item)
                                                            <tr>
                                                                <td>{{ $item['hama'] }}</td>
                                                                <td>{{ $item['standart_berkualitas'] }}</td>
                                                                <td>{{ $item['standart_buruk'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
        </section>

        {{-- form modal kriteria --}}

        <form class="modal-part" id="modal-kriteria-part" action="{{ url('kriteria') }}" method="POST">
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

                    <form action="{{ url('kriteria') }}" method="POST">
                        @csrf
                        @method('PUT')
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
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <script>
        $("#modal-kriteria").fireModal({
            title: 'Tambah Kriteria',
            body: $("#modal-kriteria-part"),
            footerClass: 'bg-whitesmoke',
            autoFocus: false,
            shown: function(modal, form) {
                console.log(form)

            },
        });

        function fungsiEdit(data) {
            var data = data.split('|');
            $('#exampleModal form').attr('action', "{{ url('kriteria') }}/" + data[1]);
            $('#warna-update').val(data[2]);
            $('#bau-update').val(data[3]);
            $('#butir-update').val(data[4]);
            $('#hama-update').val(data[5]);
            $('#mutu-update').val(data[6]);

        }
    </script>

    <!-- Page Specific JS File -->
@endpush
