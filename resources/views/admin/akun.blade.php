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

                    <!-- Main content -->
                    <section class="container-fluid" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-4">
                                <a href="/akun/create" class="btn btn-success">Tambah Akun Admin</a>
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
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            <th>Photo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($admin as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->username }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->jabatan }}</td>
                                                <td>{{ $data->nohp }}</td>
                                                <td><img src="{{ url('photo/'.$data->photo) }}" width="100px"></td>
                                                <td>
                                                    <a href="/akun/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a>
                                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        @endsection
