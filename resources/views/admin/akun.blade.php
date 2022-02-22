@extends('layout.template')

    @section('title', 'Halaman Akun Admin')

        @section('content')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Halaman Akun Admin</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active">Halaman Akun Admin</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <section class="content">
                    <!-- Pesan Ketika Data Berhasil Ditambahkan-->
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>Sukses</h4>
                            {{ session('pesan') }}.
                        </div>
                    @endif

                    @if (Auth::user()->role === 'superadmin')
                    <section class="container-fluid" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-4">
                                <a href="/register" class="btn btn-success">Tambah Akun Admin</a>
                            </div>
                        </div>
                    </section>

                    <section class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><strong> Data Akun Admin PUSKESOS</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr class="table-primary">
                                            <th style="width: 10px">No</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            <th style="20px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->jabatan }}</td>
                                                <td>{{ $data->nohp }}</td>
                                                <td>
                                                    <form action="{{ route('akun.destroy', $data->id)}}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('put')
                                                        <button class="btn- btn-sm btn-danger mb-2 border-0" onclick="return confirm('Yakin akan menghapus data?')">DELETE</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    @endif

                    @if (Auth::user()->role === 'admin')
                    <section class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><strong> Data Akun Admin PUSKESOS</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr class="table-primary">
                                            <th style="width: 10px">No</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            {{-- <th style="20px">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->jabatan }}</td>
                                                <td>{{ $data->nohp }}</td>
                                                {{-- <td>
                                                    <form action="{{ route('akun.destroy', $data->id)}}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('put')
                                                        <button class="btn- btn-sm btn-danger mb-2 border-0" onclick="return confirm('Yakin akan menghapus data?')">DELETE</button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                    @endif
                    {{-- <!-- Main content -->
                    <section class="container-fluid" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-4">
                                <a href="/register" class="btn btn-success">Tambah Akun Admin</a>
                            </div>
                        </div>
                    </section>

                    <section class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><strong> Data Akun Admin PUSKESOS</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr class="table-primary">
                                            <th style="width: 10px">No</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            <th style="20px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->jabatan }}</td>
                                                <td>{{ $data->nohp }}</td>
                                                <td>
                                                    <form action="{{ route('akun.destroy', $data->id)}}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('put')
                                                        <button class="btn- btn-sm btn-danger mb-2 border-0" onclick="return confirm('Yakin akan menghapus data?')">DELETE</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section> --}}
                </section>
            </div>
        @endsection
