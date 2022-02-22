<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Daftar Pengajuan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 8pt;
        }

        .text-center {
            text-align: center;
        }

    </style>
    <h1 class="text-center">Laporan Data Pengajuan Penerima Bansos</h1>

    <div class="text-center">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>No Kartu Keluarga</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status Penerima</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1 @endphp
                @foreach ($datas as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->kk }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
