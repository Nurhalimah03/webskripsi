@extends('layout.template')

@section('title', 'Halaman Tambah Akun Admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Akun Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Tambah Akun Admin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card mb-3 mx-auto" style="max-width: 800px";>
            <div class="card-header">
              <strong>Tambah Akun Admin </strong>
            </div>
            <div class="card-body">
                <form action="{{ url('/akun/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10 ">
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="masukan email" value="{{ old('email') }}" autofocus/>
                        <div class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10 ">
                        <input name="password" type="password" class="form-control" id="password"
                       placeholder="masukan password" value="{{ old('password') }}"/>
                       <div class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                       </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10 ">
                          <input name="nama" type="text" class="form-control" id="nama"
                          placeholder="masukan nama" value="{{ old('nama') }}"/>
                          <div class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10 ">
                          <input name="jabatan" type="text" class="form-control" id="jabatan"
                          placeholder="masukan kedudukan jabatan" value="{{ old('jabatan') }}"/>
                           <div class="text-danger">
                            @error('jabatan')
                                {{ $message }}
                            @enderror
                           </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nohp" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10 ">
                          <input name="nohp" type="number" class="form-control" id="nohp"
                           placeholder="masukan no hp" value="{{ old('nohp') }}"/>
                          <div class="text-danger">
                            @error('nohp')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Tambahkan</button>

                </form>
            </div>
          </div>

    </div>
@endsection
