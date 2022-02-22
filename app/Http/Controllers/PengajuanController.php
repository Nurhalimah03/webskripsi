<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PengajuanController extends Controller
{
    public function __construct()
    {
        $this->PengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        // $data = DB::table('tbl_pengajuan')->simplePaginate(10);
        // return view('pengajuan.index', compact('data'));
        return view('pengajuan.index');
    }

    public function dtPengajuan(Request $request)
    {
        if ($request->ajax()) {
            $data = PengajuanModel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <form action="/pengajuan/detail/' . $row->id . '" method="post" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="GET">
                        <button class="btn- btn-sm btn-primary mb-2 border-0"><i class="fas fa-eye"></i></button>
                    </form>
                    <form action="' . route("pengajuan.edit", $row->id) . '" method="post" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="GET">
                        <button class="btn- btn-sm btn-warning mb-2 border-0"><i class="fas fa-edit"></i></button>
                    </form>
                    <form action="' . route("pengajuan.destroy",  $row->id) . '" method="post" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="PUT">
                        <button class="btn- btn-sm btn-danger mb-2 border-0"
                        onclick=\'return confirm("Yakin akan menghapus data?")\'><i class="fas fa-trash"></i></button>
                    </form>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function detail($id)
    {
        if (!$this->PengajuanModel->detailData($id)) {
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
        ], [
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

        $jmlh_status = Request()->sekolah + Request()->lansia + Request()->bumil + Request()->disabilitas;

        $data = [
            'kk'            => Request()->kk,
            'nik'           => Request()->nik,
            'nama'          => Request()->nama,
            'alamat'        => Request()->alamat,
            'tanggungan'    => Request()->tanggungan,
            'sekolah'       => Request()->sekolah,
            'lansia'        => Request()->lansia,
            'bumil'         => Request()->bumil,
            'disabilitas'   => Request()->disabilitas,
            'status'        => $jmlh_status >= 1 ? 'PKH' : 'REGULER'
        ];
        $this->PengajuanModel->addData($data);
        return redirect()->route('pengajuan')->with('pesan', 'Pengajuan Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $idpengajuan = PengajuanModel::findOrFail($id);
        $idpengajuan->delete();
        //tbl_pengajuan::destroy($data->id);
        return redirect('/pengajuan')->with('pesan', 'Data Pengajuan Berhasil Dihapus');
    }

    public function edit($id)
    {
        $getpengajuan = PengajuanModel::findOrFail($id);
        return view('pengajuan.edit', ['getpengajuan' => $getpengajuan]);
    }

    public function update($id)
    {
        Request()->validate([
            'kk'            => 'required|min:16|max:16',
            'nik'           => 'required|min:16|max:16',
            'nama'          => 'required',
            'alamat'        => 'required',
            'tanggungan'    => 'required',
            'sekolah'       => 'required',
            'lansia'        => 'required',
            'bumil'         => 'required',
            'disabilitas'   => 'required',
        ], [
            'kk.required'           => 'Harap diisi!',
            'kk.min'                => 'Isi 16 angka Nomor KK',
            'kk.max'                => 'Isi 16 angka Nomor KK',
            'nik.required'          => 'Harap diisi!',
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
        $pengajuan = PengajuanModel::findOrFail($id);
        $jmlh_status = Request()->sekolah + Request()->lansia + Request()->bumil + Request()->disabilitas;

        $pengajuan->update([
            'kk'            => Request()->kk,
            'nik'           => Request()->nik,
            'nama'          => Request()->nama,
            'alamat'        => Request()->alamat,
            'tanggungan'    => Request()->tanggungan,
            'sekolah'       => Request()->sekolah,
            'lansia'        => Request()->lansia,
            'bumil'         => Request()->bumil,
            'disabilitas'   => Request()->disabilitas,
            'status'        => $jmlh_status >= 1 ? 'PKH' : 'REGULER'
        ]);
        return redirect()->route('pengajuan')->with('pesan', 'Pengajuan Berhasil Diupdate');
    }

    public function search(Request $request)
    {
        $key = $request->search;

        $data = DB::table('tbl_pengajuan')->where('kk', 'like', '%' . $key . '%')
            ->where('nik', 'like', '%' . $key . '%')
            ->where('nama', 'like', '%' . $key . '%')
            ->select('*')
            ->simplePaginate(10);
        return view('pengajuan.search', compact('key', 'data'));
    }
}
