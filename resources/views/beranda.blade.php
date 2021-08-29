@extends('layout.template')

@section('title', 'Beranda')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Beranda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" ><strong>PUSKESOS</strong></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <img src="{{ asset ('template') }}/dist/img/puskesos.jpg" class="rounded mx-auto d-block" alt="Logo Dinsos">
            <p>Puskesos (Pusat Kesejahteraan Sosial) merupakan pelayanan terpadu bagi permasalah sosial yang ada di Kota Bandung yang terletak di kelurahan-kelurahan di Kota Bandung.</p>
            <p>Puskesos dilengkapi dengan fasilitator untuk melakukan pelayanan sosial. Selain penanganan Penyandang Masalah Kesejahteraan Sosial (PMKS), terdapat beberapa hal penting yang dilakukan oleh Puskesos, diantaranya:</p>
            <p>1. Verifikasi dan Validasi
                <br> Dinsosnangkis Kota Bandung melalui Puskesos memverifikasi dan memvalidasi data penerima bantuan. Kbrdah 99 persen data yang terverifikasi. Artinya data yang ada merupakan data terbaru.</p>
            <p>2. Melajani Jaminan Sosial
                <br> Puskesos melayani masyarakat yang belum mendapatkan jaminan sosial. Nantinya brakat yang mendapatkan bantuan harus berbasis Data Terpadu Kesejahteraan Sosial (DTKS). Pengusulan DTKS dilakukan melalui Puskesos.</p>
            <p>3. Sistem Layanan dan Rujukan Terpadu
                <br> Masyarakat yang tidak memiliki BPJS dapat meminta rujukan ke Sistem Layanan dan Rujukan Terpadu (SLRT) di Puskesos.
        </div>

      </div>
    </section>
  </div>

@endsection
