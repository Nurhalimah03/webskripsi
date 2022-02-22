@extends('layout.template')

@section('title', 'Halaman Tambah Pengajuan')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Pengajuan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Tambah Pengajuan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card mb-3 mx-auto" style="max-width: 900px";>
            <div class="card-header">
              <strong> Form Pengajuan </strong>
            </div>
            <div class="card-body">
                <form action="/pengajuan/insert" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label">No Kartu Keluarga</label>
                      <div class="col-sm-9">
                        <input name="kk" type="number" class="form-control" id="kk" value="{{ old('kk') }}"
                        placeholder="Masukan no kartu keluarkan" autofocus/>
                        <div class="text-danger">
                            @error('kk')
                                {{ $message }}
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label">NIK</label>
                      <div class="col-sm-9">
                        <input name="nik" type="number" class="form-control" id="nik" value="{{ old('nik') }}"
                        placeholder="Masukan NIK" />
                        <div class="text-danger">
                            @error('nik')
                                {{ $message }}
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                          <input name="nama" type="text" class="form-control" id="nama" value="{{ old('nama') }}"
                          placeholder="Masukan nama yang mengajukan" />
                          <div class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                          <input name="alamat" type="text" class="form-control" id="alamat" value="{{ old('alamat') }}"
                          placeholder="Masukan alamat yang mengajukan" />
                          <div class="text-danger">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jumlah tanggungan</label>
                        <div class="col-sm-9">
                          <input name="tanggungan" type="number" class="form-control" id="tanggungan" value="{{ old('tanggungan') }}"
                          placeholder="Masukan jumlah tanggungan" />
                          <div class="text-danger">
                            @error('tanggungan')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jumlah Anak Yang Bersekolah</label>
                        <div class="col-sm-9">
                          <input name="sekolah" type="number" class="form-control" id="sekolah" value="{{ old('sekolah') }}"
                          placeholder="Masukan jumlah anak yang bersekolah" />
                          <div class="text-danger">
                            @error('sekolah')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jumlah Lansia</label>
                        <div class="col-sm-9">
                          <input name="lansia" type="number" class="form-control" id="lansia" value="{{ old('lansia') }}"
                          placeholder="masukan jumlah lansia yang tinggal" />
                          <div class="text-danger">
                            @error('lansia')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jumlah Ibu Hamil</label>
                        <div class="col-sm-9">
                          <input name="bumil" type="number" class="form-control" id="bumil" value="{{ old('bumil') }}"
                          placeholder="Masukan jumlah ibu hamil yang tinggal" />
                          <div class="text-danger">
                            @error('bumil')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jumlah Penyandang Disabilitas</label>
                        <div class="col-sm-9">
                          <input name="disabilitas" type="number" class="form-control" id="disabilitas" value="{{ old('disabilitas') }}"
                          placeholder="Masukan jumlah penyandang disabilitas yang tinggal" />
                          <div class="text-danger">
                            @error('disabilitas')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">AJUKAN</button>

                </form>
            </div>
          </div>

    </div>
@endsection
