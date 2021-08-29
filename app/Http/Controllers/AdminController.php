<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Symfony\Component\Mime\MimeTypes;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'admin' => $this->AdminModel->allData(),
        ];
        return view('admin.akun', $data);
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
            'username' => 'required|unique|min:4',
            'password' => 'required',
            'nama'     => 'required',
            'jabatan'  => 'required',
            'nohp'     => 'required',
            'photo'    => 'required|mimes:jpg,bmp,png,jpeg|max:1024',
        ],[
            'username.required'     => 'Username wajib diisi!',
            'username.unique'       => 'Username sudah terdaftar!',
            'username.min'          => 'Username minimal 4 huruf!',
            'password.required'     => 'Password wajib diisi!',
            'nama.required'         => 'Nama wajib diisi!',
            'jabatan.required'      => 'Jabatan wajib diisi!',
            'nohp.required'         => 'No Hp wajib diisi!',
            'photo.required'        => 'Silahkan pilih file photo!',
            'photo.mimes'           => 'Ekstensi file tidak mendukung!',
            'photo.max'             => 'Ukuran file terlalu besar!',
        ]);

        $file = $request->photo;
        $fileName = $request->username . '.' . $file->extension();
        $file->move(public_path('photo'), $fileName);



        AdminModel::create([
            'username'  => $request->username,
            'password'  => $request->password,
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'nohp'      => $request->nohp,
            'photo'     => $request->photo,

            ]);

        /*$this->AdminModel->addData($data);*/
        return redirect()->route('akun')->with('pesan', 'Akun Admin Berhasil Ditambahkan!');
    }
}
