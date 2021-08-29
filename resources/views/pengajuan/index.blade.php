@extends('layout.template')

@section('title', 'Halaman Pengajuan')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Pengajuan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Pengajuan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


    <!-- Main content -->
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
                    <a href="/pengajuan/create" class="btn btn-success">Tambah Pengajuan</a>
                </div>
                <div class="col-4 align-self-end">
                    <input type="search" class="form-control form-control-md" placeholder="Type your keywords here"
                    aria-controls="example">
                </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><strong> Data Pengajuan Penerima Bansos</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                            <tr class="table-primary">
                                <th style="width: 10px">#</th>
                                <th>No Kartu Keluarga</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Status Penerima</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($pengajuan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->kk }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <a href="/pengajuan/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a>
                                                    <a href="" class="btn btn-sm btn-warning">Edit</a>
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
