@extends('layout.template')

@section('title', 'Halaman Detail Data Admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Detail Data Admin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

                <div class="card mb-3 mx-auto" style="max-width: 600px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                             <img src="{{ url('photo/'.$admin->photo) }}" class="img-fluid rounded-start" alt="Gedung Puskesos">
                         </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                 <table class="table">
                                    <tr>
                                        <th width="100px">Username</th>
                                        <th width="30px">:</th>
                                        <th>{{ $admin->username }}</th>
                                    </tr>
                                    <tr>
                                        <th width="100px">Nama</th>
                                        <th width="30px">:</th>
                                        <th>{{ $admin->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th width="100px">Jabatan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $admin->jabatan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="100px">No Hp</th>
                                        <th width="30px">:</th>
                                        <th>{{ $admin->nohp }}</th>
                                    </tr>
                                 </table>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <th><a href="/akun" class="btn btn-success tbn-sm">Kembali</a></th>
                    </tr>

                </div>

    </div>
@endsection
