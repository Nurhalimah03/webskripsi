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
                        <h1>Tambah Akun Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Halaman Tambah Akun Admin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card mb-3 mx-auto" style="max-width: 800px";>
            <div class="card-header">
              Tambah Akun Admin
            </div>
            <div class="card-body">
                <form action="{{ url('/akun/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10 ">
                        <input name="username" type="text" class="form-control" id="username"
                        placeholder="masukan username" value="{{ old('username') }}"
                        required autocomplete="username" autofocus/>
                        <div class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10 ">
                        <input name="password" type="password" class="form-control" id="password"
                       placeholder="masukan password" value="{{ old('password') }}"
                       required autocomplete="password" autofocus/>
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
                          placeholder="masukan nama" value="{{ old('nama') }}"
                          required autocomplete="nama" autofocus/>
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
                          placeholder="masukan kedudukan jabatan" value="{{ old('jabatan') }}"
                           required autocomplete="jabatan" autofocus/>
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
                           placeholder="masukan no hp" value="{{ old('nohp') }}"
                          required autocomplete="nohp" autofocus/>
                          <div class="text-danger">
                            @error('nohp')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                    </div>

                   <div class="row mb-3">
                        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                          <input nama="photo" type="file" class="form-control" id="photo" value="{{ old('photo') }}">
                          <div class="text-danger">
                            @error('photo')
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
