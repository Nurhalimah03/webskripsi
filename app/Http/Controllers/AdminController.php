<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        return view('admin.akun');
    }

    public function dtAdmin(Request $request)
    {
        if ($request->ajax()) {
            $mAdmin = new AdminModel();
            $data = $mAdmin->allData();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <form action="' . route("akun.destroy", $row->id) . '" method="post" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="PUT">
                        <button class="btn- btn-sm btn-danger mb-2 border-0"
                        onclick=\'return confirm("Yakin akan menghapus data?")\'">DELETE</button>
                    </form>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function detail($id)
    {
        if (!$this->AdminModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'admin' => $this->AdminModel->detailData($id),
        ];
        return view('admin.detail', $data);
    }

    public function add()
    {
        return view('admin.create');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'nama'     => 'required',
            'jabatan'  => 'required',
            'nohp'     => 'required',
        ], [
            'email.required'     => 'Email wajib diisi!',
            'email.unique'       => 'Email sudah terdaftar!',
            'password.required'     => 'Password wajib diisi!',
            'password.min'          => 'Password minimal 8 digit',
            'nama.required'         => 'Nama wajib diisi!',
            'jabatan.required'      => 'Jabatan wajib diisi!',
            'nohp.required'         => 'No Hp wajib diisi!',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'name'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'nohp'      => $request->nohp,
            'role'      => 'admin'
        ];

        $this->AdminModel->addData($data);
        return redirect()->route('akun')->with('pesan', 'Akun Admin Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $idadmin = AdminModel::findOrFail($id);
        $idadmin->delete();
        return redirect('/akun')->with('pesan', 'Data Akun Admin Berhasil Dihapus');
    }
}
