@extends('layout.template')

@section('title', 'Halaman Kontak Puskesos')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Kontak Puskesos </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Kontak Puskesos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

                <div class="card mb-3 mx-auto" style="max-width: 950px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                             <img src="{{ asset('template') }}/dist/img/gedungdinsos.jpg" class="img-fluid rounded-start" alt="Gedung Puskesos">
                         </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                 <p class="card-text"><i class="fas fa-building"></i> Jl. Cipamokolan No.109, Derwati, Kec. Rancasari, Kota Bandung, Jawa Barat 40292</p>
                                 <p class="card-text"><i class="fas fa-map-marked-alt"></i><a href="https://www.google.com/maps/dir/-6.9600284,107.5860216/Dinas+Sosial+Kota+Bandung,+Jl.+Cipamokolan+No.109,+Derwati,+Kec.+Rancasari,+Kota+Bandung,+Jawa+Barat+40292/@-6.9491521,107.5620408,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2e68c288b73e35bb:0x240c62acfe122ce9!2m2!1d107.6819242!2d-6.9620638"> With Google Map</a></p>
                                 <p class="card-text"><i class="fas fa-lg fa-globe"></i><a href="http://www.dinsosnangkis.bandung.go.id/"> http://www.dinsosnangkis.bandung.go.id/</a></p>
                                 <p class="card-text"><i class="fab fa-instagram"></i> @dinsosbdg</p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
