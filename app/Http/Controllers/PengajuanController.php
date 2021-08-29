<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;


class PengajuanController extends Controller
{
    public function __construct()
    {
        $this->PengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        $data = [
            'pengajuan' => $this->PengajuanModel->allData(),
        ];
        return view('pengajuan.index', $data);
    }

    public function detail($id)
    {
        if (!$this->PengajuanModel->detailData($id)){
            abort(404);
        }
        $data = [
            'pengajuan' => $this->PengajuanModel->detailData($id),
        ];
        return view('pengajuan.detail', $data);
    }

    public function add()
    {
        return view('pengajuan.create');
    }

    public function insert()
    {
        Request()->validate([
            'kk'            => 'required|unique:tbl_pengajuan,kk|min:16|max:16',
            'nik'           => 'required|unique:tbl_pengajuan,nik|min:16|max:16',
            'nama'          => 'required',
            'alamat'        => 'required',
            'tanggungan'    => 'required',
            'sekolah'       => 'required',
            'lansia'        => 'required',
            'bumil'         => 'required',
            'disabilitas'   => 'required',
        ],[
            'kk.required'           => 'Harap diisi!',
            'kk.unique'             => 'Nomor KK telah terdaftar',
            'kk.min'                => 'Isi 16 angka Nomor KK',
            'kk.max'                => 'Isi 16 angka Nomor KK',
            'nik.required'          => 'Harap diisi!',
            'nik.unique'            => 'NIK telah terdaftar',
            'nik.min'               => 'Isi 16 angka NIK',
            'nik.max'               => 'Isi 16 angka NIK',
            'nama.required'         => 'Harap diisi!',
            'alamat.required'       => 'Harap diisi',
            'tanggungan.required'   => 'Harap diisi!',
            'sekolah.required'      => 'Harap diisi!',
            'lansia.required'       => 'Harap diisi!',
            'bumil.required'        => 'Harap diisi!',
            'disabilitas.required'  => 'Harap diisi!',
        ]);

        $data = [
            'kk'            => Request()->kk,
            'nik'           => Request()->nik,
            'nama'          => Request()->nama,
            'alamat'        => Request()->alamat,
            'tanggungan'    => Request()->tanggungan,
            'sekolah'       => Request()->sekolah,
            'lansia'        => Request()->lansia,
            'bumil'         => Request()->bumil,
            'disabilitas'   => Request()->disabilitas
        ];
        $this->PengajuanModel->addData($data);
        return redirect()->route('pengajuan')->with('pesan', 'Pengajuan Berhasil Ditambahkan');
    }
}
