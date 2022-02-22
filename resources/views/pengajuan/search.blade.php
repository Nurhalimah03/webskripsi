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
                            <li class="breadcrumb-item"><a href="{{ url ('/beranda') }}">Beranda</a></li>
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
                <div class="col-4 in-line">
                    <input type="search" class="form-control form-control-md" placeholder="Type your keywords here"
                    aria-controls="example" id="search" name="search">
                    <a href="#" class="btn btn-primary">Cari</a>

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
                                <th>#</th>
                                <th>No Kartu Keluarga</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th >Alamat</th>
                                <th>Status Penerima</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->kk }}</td>
                                    <td>{{ $dt->nik }}</td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{{ $dt->alamat }}</td>
                                    <td>{{ $dt->status }}</td>
                                    <td>
                                        <div class="d-inline">
                                            <a href="/pengajuan/detail/{{ $dt->id }}" class="btn btn-sm btn-primary mb-2"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('pengajuan.edit', $dt->id) }}" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('pengajuan.destroy', $dt->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('put')
                                                <button class="btn- btn-sm btn-danger mb-2 border-0" onclick="return confirm('Yakin akan menghapus data?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $data->links() }}
                       </div>
                </div>
            </div>
        </section>
    </section>
    </div>
@endsection
