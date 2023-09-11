@extends('layouts.app')

@section('title', 'Performa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Performa</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Performa</h2>


                <div class="row">

                    <div class="col-sm-12 col-md-12">

                        <div class="card">
                            <div class="card-header">

                                <div class="col">
                                    <button type="button" class="btn btn-primary float-right" id="modal-Performa">
                                        Tambah Performa
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
                                            @foreach ($Performa as $data)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data['warna'] }}</td>
                                                    <td>{{ $data['bau'] }}</td>
                                                    <td>{{ $data['butir'] }}</td>
                                                    <td>{{ $data['hama'] }}</td>
                                                    <td>{{ $data['mutu'] }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            id="modal-Performa-ubah" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            onclick="fungsiEdit('{{ 'modal-Performa-ubah' }}|{{ $data['id'] }}|{{ $data['warna'] }}|{{ $data['bau'] }}|{{ $data['butir'] }}|{{ $data['hama'] }}|{{ $data['mutu'] }}|')">
                                                            Ubah
                                                        </button>

                                                        <form action="{{ url('tambah-performa/' . $data['id']) }}"
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
                   
        </section>

        {{-- form modal Performa --}}

        <form class="modal-part" id="modal-Performa-part" action="{{ url('tambah-performa') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Warna</label>
                <div class="input-group">
                    <select class="form-control" id="warna" name="warna">
                        <option selected value="">Pilih Warna</option>
                        <option value="Putih">Putih</option>
                        <option value="Kuning">Kuning</option>
                        <option value="Hitam">Hitam</option>
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

                    <form action="{{ url('tambah-performa') }}" method="POST">
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
                                        <option value="Hitam">Hitam</option>
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
        $("#modal-Performa").fireModal({
            title: 'Tambah Performa',
            body: $("#modal-Performa-part"),
            footerClass: 'bg-whitesmoke',
            autoFocus: false,
            shown: function(modal, form) {
                console.log(form)

            },
        });

        function fungsiEdit(data) {
            var data = data.split('|');
            $('#exampleModal form').attr('action', "{{ url('tambah-performa') }}/" + data[1]);
            $('#warna-update').val(data[2]);
            $('#bau-update').val(data[3]);
            $('#butir-update').val(data[4]);
            $('#hama-update').val(data[5]);
            $('#mutu-update').val(data[6]);

        }
    </script>

    <!-- Page Specific JS File -->
@endpush
