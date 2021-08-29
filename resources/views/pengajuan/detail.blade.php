@extends('layout.template')

@section('title', 'Halaman Detail Data Pengajuan')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Pengajuan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Detail Data Pengajuan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card mb-3 mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="200px">No Kartu Keluarga</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->kk }}</th>
                    </tr>
                    <tr>
                        <th width="200px">NIK</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->nik }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Nama</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->nama }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Alamat</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->alamat }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah tanggungan</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->tanggungan }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah anak yang bersekolah</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->sekolah }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah lansia</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->lansia }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah Ibu Hamil</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->bumil }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Jumlah penyandnag disabilitas</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->disabilitas }}</th>
                    </tr>
                    <tr>
                        <th width="200px">Status Penerima Bansos</th>
                        <th width="30px">:</th>
                        <th>{{ $pengajuan->status }}</th>
                    </tr>
                 </table>
            </div>
            <tr>
                <th><a href="/pengajuan" class="btn btn-success tbn-sm">Kembali</a></th>
            </tr>
        </div>
    </div>
@endsection
