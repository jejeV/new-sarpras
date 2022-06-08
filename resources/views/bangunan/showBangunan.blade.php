@extends('myLayouts.main')

@section('tambahcss')
    <style>
        .input-group-prepend button i {
            position: absolute;
            left: 35px;
        }

    </style>
@endsection

@section('container')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">
                        {{ str_replace('_', ' ', request('jenis')) }}</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- End Header --}}

    @if (request('jenis') == 'ruang_pimpinan' && Auth::user()->hasRole('dinas'))
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: #25b5e9">
                    <h3 class="card-title text-white font-weight-bold">Jenis Ruang Pimpinan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                            data-target="#tambah-jenis-pimpinan"><i class="bi bi-plus"></i> Tambah Jenis Ruang Pimpinan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($jenisPimpinans) > 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle;">No</th>
                                        <th rowspan="2" style="vertical-align: middle;">Nama Ruang</th>
                                        <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenisPimpinans as $key => $jenis)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center text-capitalize nama-jenis-pimpinan"
                                                data-id="{{ $jenis->id }}">{{ $jenis->nama }}</td>
                                            <td class="text-center text-capitalize">
                                                <button type="button"
                                                    class="btn btn-warning button-jenis-pimpinan text-white"
                                                    data-toggle="modal" data-target="#edit-jenis-pimpinan">Edit
                                                </button>
                                                <form action="/jenis-pimpinan/{{ $jenis->id }}" method="post"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-success"
                                                        onclick="return confirm('Apakah anda yakin akan menghapus jenis ruang pimpinan ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                                <div class="alert" role="alert">
                                    Data Tidak Ditemukan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="tambah-jenis-pimpinan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Ketersediaan Ruang Pimpinan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/jenis-pimpinan" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Ruang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-jenis-pimpinan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jenis Ruang Pimpinan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-jenis-pimpinan" action="/jenis-pimpinan" method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Ruang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-nama-jenis-pimpinan" id="nama"
                                            name="nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    @elseif(request('jenis') == 'laboratorium' && Auth::user()->hasRole('dinas'))
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: #25b5e9">
                    <h3 class="card-title text-white font-weight-bold">Jenis Laboratorium</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                            data-target="#tambah-jenis-pimpinan"><i class="bi bi-plus"></i> Tambah Jenis Laboratorium
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($jenisPimpinans) > 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle;">No</th>
                                        <th rowspan="2" style="vertical-align: middle;">Jenis</th>
                                        <th rowspan="2" style="vertical-align: middle;">Kompetensi Keahlian</th>
                                        <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenisPimpinans as $key => $jenis)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center text-capitalize nama-jenis-pimpinan"
                                                data-id="{{ $jenis->id }}">{{ $jenis->nama }}</td>
                                            <td class="text-center text-capitalize nama-jenis-pimpinan"
                                                data-id="{{ $jenis->id }}">Rekayasa Perangkat Lunak</td>
                                            <td class="text-center text-capitalize">
                                                <button type="button"
                                                    class="btn btn-warning button-jenis-pimpinan text-white"
                                                    data-toggle="modal" data-target="#edit-jenis-pimpinan">Edit
                                                </button>
                                                <form action="/jenis-pimpinan/{{ $jenis->id }}" method="post"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-success"
                                                        onclick="return confirm('Apakah anda yakin akan menghapus jenis ruang pimpinan ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                                <div class="alert" role="alert">
                                    Data Tidak Ditemukan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="tambah-jenis-pimpinan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Jenis Laboratorium</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/jenis-pimpinan" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Jenis Laboratorium</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                    <div class="col-sm-9">
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-jenis-pimpinan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jenis Ruang Pimpinan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-jenis-pimpinan" action="/jenis-pimpinan" method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Jenis Laboratorium</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-nama-jenis-pimpinan" id="nama"
                                            name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                    <div class="col-sm-9">
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Table --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-warning d-flex p-0">
                <h3 class="card-title p-3 text-white" style="text-transform: capitalize;">
                    {{ str_replace('_', ' ', request('jenis')) }}</h3>
            </div>
            <div class="card-body">
                {{-- Table --}}
                <div class="table-responsive">
                    @if (count($usulanBangunans) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mt-2">
                                <div class="search" style="display: flex">
                                    @if (!Auth::user()->hasRole('kcd'))
                                        <ul class="nav nav-pills ml-auto p-2 col-1" style="max-width: 11%;">
                                            <li class="nav-item dropdown mb-3">
                                                <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Order by ... <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu"
                                                    style="min-width: auto !important; width: 125px;">
                                                    <form action="/bangunan-all" method="get">
                                                        @if (request('jenis'))
                                                            <input type="hidden" name="jenis"
                                                                value="{{ request('jenis') }}">
                                                        @endif
                                                        @if (request('search'))
                                                            <input type="hidden" name="search"
                                                                value="{{ request('search') }}">
                                                        @endif
                                                        <input type="hidden" name="filter" value="kota">
                                                        <button class="dropdown-item text-truncate kab" tabindex="-1"
                                                            type="submit">Kota/Kabupaten</button>
                                                    </form>
                                                    <form action="/bangunan-all" method="get">
                                                        @if (request('jenis'))
                                                            <input type="hidden" name="jenis"
                                                                value="{{ request('jenis') }}">
                                                        @endif
                                                        @if (request('search'))
                                                            <input type="hidden" name="search"
                                                                value="{{ request('search') }}">
                                                        @endif
                                                        <input type="hidden" name="filter" value="kcd">
                                                        <button class="dropdown-item text-truncate kab" tabindex="-1"
                                                            type="submit">Kantor Cabang Dinas</button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                    <div class="md-2 col-11 mt-2" style="max-width: 89%;">
                                        <form class="form-inline ml-2" action="/bangunan-all" method="GET"
                                            style="width: 100%;">
                                            @if (request('jenis'))
                                                <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                                            @endif
                                            @if (request('filter'))
                                                <input type="hidden" name="filter" value="{{ request('filter') }}">
                                            @endif
                                            <div class="input-group"
                                                style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                                                <input class="form-control form-control-navbar" type="search"
                                                    placeholder="Search Nama Sekolah" aria-label="Search"
                                                    style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;"
                                                    name="search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Status Sekolah</th>
                                        <th>Kabupaten / Kota</th>
                                        <th>Kantor Cabang Dinas</th>
                                        <th>Proposal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usulanBangunans as $key => $usulan)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->nama }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->status_sekolah }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->kabupaten }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->instansi }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                                    <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                </a>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <a href="/usulan-bangunan/{{ $usulan->id }}"
                                                    class="btn text-white d-inline"
                                                    style="background-color: #00a65b">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Data Tidak Ditemukan
                            </div>
                        </div>
                    @endif
                </div>
                {{-- End --}}
                {{-- Pagination --}}
                {{-- <div class="float-right">
                    {{ $usulanBangunans->links() }}
                </div> --}}
                {{-- End --}}
            </div>
        </div>
    </div>
    {{-- End --}}
@endsection

@if (request('jenis') == 'ruang_pimpinan')
    @section('tambahjs')
        <script>
            const inputNamaJenisPimpinan = document.querySelector('.input-nama-jenis-pimpinan');
            const buttonJenisPimpinan = document.querySelectorAll('.button-jenis-pimpinan');
            const namaJenisPimpinan = document.querySelectorAll('.nama-jenis-pimpinan');
            const formJenisPimpinan = document.querySelector('.form-jenis-pimpinan');

            buttonJenisPimpinan.forEach((e, i) => {
                e.addEventListener('click', function() {
                    inputNamaJenisPimpinan.value = '';
                    inputNamaJenisPimpinan.value = namaJenisPimpinan[i].innerHTML;
                    formJenisPimpinan.removeAttribute('action');
                    formJenisPimpinan.setAttribute('action', '/jenis-pimpinan/' + namaJenisPimpinan[i]
                        .getAttribute('data-id'))
                })
            });
        </script>
    @endsection
@endif
