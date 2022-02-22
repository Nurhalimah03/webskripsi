<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mime\MimeTypes;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        // $data = DB::table('tbl_admin');
        // $data = $data->get();
        $data = AdminModel::All();
        return view('admin.akun', compact('data'));

        // $getUser = User::get();;
        // return view('admin.akun', compact('getUser'));
    }

    public function detail($id)
    {
        if (!$this->AdminModel->detailData($id)){
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

    public function insert(Request$request)
    {
        $this->validate($request, [
            'email' => 'required|unique:tbl_admin',
            'password' => 'required|min:8',
            'nama'     => 'required',
            'jabatan'  => 'required',
            'nohp'     => 'required',
        ],[
            'email.required'     => 'Email wajib diisi!',
            'email.unique'       => 'Email sudah terdaftar!',
            'password.required'     => 'Password wajib diisi!',
            'password.min'          => 'Password minimal 8 digit',
            'nama.required'         => 'Nama wajib diisi!',
            'jabatan.required'      => 'Jabatan wajib diisi!',
            'nohp.required'         => 'No Hp wajib diisi!',
        ]);




        AdminModel::create([
            'email'  => $request->email,
            'password'  => $request->password,
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'nohp'      => $request->nohp,

            ]);

        /*$this->AdminModel->addData($data);*/
        return redirect()->route('akun')->with('pesan', 'Akun Admin Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $idadmin = AdminModel::findOrFail($id);
        $idadmin->delete();
        return redirect('/akun')->with('pesan', 'Data Akun Admin Berhasil Dihapus');
    }
}
