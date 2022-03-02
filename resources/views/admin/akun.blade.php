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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
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

            <section class="container-fluid" style="margin-bottom: 10px;">
                <div class="row">
                    <div class="col-4">
                        <a href="/akun/create" class="btn btn-success">Tambah Akun Admin</a>
                    </div>
                </div>
                {{-- Perubahan code --}}
            </section>

            <section class="container-fluid">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><strong> Data Akun Admin PUSKESOS</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblAdmin" class="table table-bordered table-striped">
                            <thead>
                                <tr class="table-primary">
                                    <th style="width: 10px">No</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>No HP</th>
                                    <th style="20px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- GET DATA FROM JAVASCRIPT USING DATATABLES --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tblAdmin').DataTable({
                language: {
                    emptyTable: "Tidak ada data yang ditemukan",
                    lengthMenu: "Tampil _MENU_ Per Halaman",
                    zeroRecords: "Tidak ditemukan - Maaf",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada catatan yang tersedia",
                    infoFiltered: "(disaring dari _MAX_ catatan total)",
                    search: "Cari"
                },
                paginate: {
                    Next: 'Selanjutnya',
                    Last: 'Terakhir',
                    First: 'Pertama',
                    Previous: 'Sebelumnya'
                },
                lengthMenu: [
                    [10, 25, 50, 75, 100, -1],
                    [10, 25, 50, 75, 100, "Semua"]
                ],
                processing: true,
                serverSide: true,
                searching: true,
                info: true,
                paging: true,
                responsive: true,
                scrollX: false,
                ordering: true,
                autoWidth: false,

                ajax: {
                    url: "{{ route('akun.list') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },

                columns: [{
                        targets: 0,
                        className: 'text-center',
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        targets: 1,
                        className: 'text-left',
                        data: 'email',
                        name: 'email'
                    },
                    {
                        targets: 2,
                        className: 'text-left',
                        data: 'name',
                        name: 'name'
                    },
                    {
                        targets: 3,
                        className: 'text-left',
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        targets: 4,
                        className: 'text-left',
                        data: 'nohp',
                        name: 'nohp'
                    },
                    {
                        targets: -1,
                        className: 'text-center',
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
