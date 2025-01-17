@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .info-box-content p {
            padding-top: 60px;
        }

        .col-5 h1 {
            font-weight: 600;
            font-size: 2rem;
        }

        .card-content {
            font-size: 5rem;
        }

        .col-8 {
            padding-top: 40px;
        }

        .col-5 h1 {
            margin-left: 25px;
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Praktik
                        {{ $komli->kompetensi }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header" style="background-color: #00a65b">
                        <h3 class="text-white card-title font-weight-bold">Kondisi Ideal Ruang</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-kondisi-ideal-ruang"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 117px;">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->kondisi_ideal_ruang }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header" style="background-color: #25b5e9">
                        <h3 class="text-white card-title font-weight-bold">Kondisi Ideal Luas Lahan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-kondisi-ideal-lahan"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 117px;">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->kondisi_ideal_lahan }} m²</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="text-white card-title font-weight-bold">Ketersediaan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-ketersediaan"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 117px;">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->ketersediaan }}</h1>
                        <small class="text-center d-block font-weight-bold"
                            style="text-transform: capitalize;">{{ str_replace('_', ' ', $kompeten->status) }}</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header" style="background: #263238;">
                        <h3 class="card-title font-weight-bold text-white">Kekurangan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-kekurangan"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 117px;">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->kekurangan }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main-Content --}}
    <div class="container-fluid pb-1">
        <div class="info-box p-4 detail-infobox shadow-sm mb-5 bg-body rounded">
            <button type="button" class="btn" data-toggle="dropdown" style="position: absolute; top: 0; right: 0;">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            <div class="dropdown-menu" style="margin-left: -56px">
                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#upload-logo">Upload
                    Logo</button>
                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#ubah-deskripsi">Ubah
                    Deskripsi</button>
            </div>

            {{-- --------------------------------------------------------------------------- MODAL UPLOAD LOGO --------------------------------------------------------------------------- --}}
            <div class="modal fade" id="upload-logo">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" action="/kompeten/upload-logo/{{ $kompeten->id }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="modal-header" style="background-color: #25b5e9; margin-left: -0.5px">
                                <h4 class="modal-title text-white">Upload Logo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body text-center">

                                    <div class="form-group row">
                                        <label for="logo-kejuruan" class="col-sm-2 col-form-label">Logo Kejuruan</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="logo-kejuruan" name="logo"
                                                style="height: auto !important;" accept="image/*" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white float-right"
                                    style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- --------------------------------------------------------------------------- MODAL UBAH DESKRIPSI --------------------------------------------------------------------------- --}}
            <div class="modal fade" id="ubah-deskripsi">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post"
                            action="/kompeten/tambah-keterangan/{{ $kompeten->id }}">
                            @csrf
                            @method('patch')
                            <div class="modal-header" style="background-color: #00a65b; margin-left: -0.5px">
                                <h4 class="modal-title text-white">Deskripsi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body text-center">

                                    <div class="form-group row">
                                        <label for="deskripsi-ubah" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="deskripsi-ubah" rows="3" name="keterangan">{{ $kompeten->keterangan }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white float-right"
                                    style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="d-flex justify-content-center align-items-center flex-column p-2">
                            @if ($kompeten->logo == null)
                                <img src="/img/Kompetensi Keahlian.png" style="width: 18rem" class=" border float-start"
                                    alt="...">
                            @else
                                <img src="{{ asset('storage/' . $kompeten->logo) }}" style="width: 18rem"
                                    class=" border float-start" alt="...">
                            @endif
                            <p class="h4 mt-4">{{ $komli->kompetensi }}</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 d-flex justify-content-center align-items-center">
                        @if ($kompeten->keterangan)
                            <p style="font-size: 1.2rem;">{{ $kompeten->keterangan }}</p>
                        @else
                            <p style="font-size: 1.2rem;">Maaf Belum ada Keterangan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Kondisi Ideal --}}
    <div class="modal fade" id="modal-kondisi-ideal-ruang">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/kompeten/update-kondisi-ideal-ruang/{{ $kompeten->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h4 class="modal-title">Masukan Kondisi Ideal Ruang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kondisi Ideal Ruang</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Kondisi Ideal"
                                id="jumlah-ruangan" name="kondisi_ideal_ruang" required
                                value="{{ $kompeten->kondisi_ideal_ruang }}">
                        </div>
                        {{-- end input jumlah ruangan --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End --}}
    {{-- Modal Kondisi Ideal --}}
    <div class="modal fade" id="modal-kondisi-ideal-lahan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/kompeten/update-kondisi-ideal-lahan/{{ $kompeten->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h4 class="modal-title">Masukan Kondisi Ideal Lahan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kondisi Ideal Lahan</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Kondisi Ideal"
                                id="jumlah-ruangan" name="kondisi_ideal_lahan" required
                                value="{{ $kompeten->kondisi_ideal_lahan }}">
                        </div>
                        {{-- end input jumlah ruangan --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End --}}

    {{-- Modal Ketersediaan --}}
    <div class="modal fade" id="modal-ketersediaan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/kompeten/update-ketersediaan/{{ $kompeten->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h4 class="modal-title">Masukan Ketersediaan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ketersediaan</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Ketersediaan"
                                id="jumlah-ruangan" name="ketersediaan" required
                                value="{{ $kompeten->ketersediaan }}">
                        </div>
                        {{-- end input jumlah ruangan --}}

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="custom-control custom-switch" style="transform: scale(1)">
                                <input type="checkbox" class="custom-control-input button-ideal" id="customSwitch1"
                                    name="status" {{ $kompeten->status == 'ideal' ? 'checked' : '' }}>
                                <label class="custom-control-label label-ideal" for="customSwitch1"
                                    style="height: 1rem; vertical-align: middle; font-size:14px;">Tidak Ideal</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End Modal Ketersediaan --}}

    {{-- Modal Kekurangan --}}
    <div class="modal fade" id="modal-kekurangan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/kompeten/update-kekurangan/{{ $kompeten->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h4 class="modal-title">Masukan Kekurangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kekurangan</label>
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Kekurangan"
                                id="jumlah-ruangan" name="kekurangan" required value="{{ $kompeten->kekurangan }}">
                        </div>
                        {{-- end input jumlah ruangan --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End Modal Kekurangan --}}
@endsection

@section('tambahjs')
    <script>
        const button = document.querySelector('.button-ideal')
        const label = document.querySelector('.label-ideal')

        button.addEventListener('click', function() {
            if (button.checked) {
                label.innerHTML = 'Ideal'
            } else {
                label.innerHTML = 'Tidak Ideal'
            }

        });
    </script>
@endsection
