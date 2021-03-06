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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
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
                    <div class="col-2">
                        <a href="/pengajuan/create" class="btn btn-success">Tambah Pengajuan</a>
                    </div>
                    <div class="col-2">
                        <form action="{{ route('pengajuanPdf') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Unduh PDF</button>
                        </form>
                    </div>
            </section>

            <section class="container-fluid">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><strong> Data Pengajuan Penerima Bansos</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblPengajuan" class="table table-bordered table-striped">
                            <thead>
                                <tr class="table-primary">
                                    <th>#</th>
                                    <th>No Kartu Keluarga</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Status Penerima</th>
                                    <th>Aksi</th>
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
            $('#tblPengajuan').DataTable({
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
                    url: "{{ route('pengajuan.list') }}",
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
                        data: 'kk',
                        name: 'kk'
                    },
                    {
                        targets: 2,
                        className: 'text-left',
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        targets: 3,
                        className: 'text-left',
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        targets: 4,
                        className: 'text-left',
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        targets: 5,
                        className: 'text-center',
                        data: 'status',
                        name: 'status'
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
