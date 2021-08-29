<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengajuanModel extends Model
{
    protected $table = "tbl_pengajuan";
    protected $guarded = [];
    public $timestamps = false;


    public function allData()
    {
       return DB::table('tbl_pengajuan')->get();
    }

    public function detailData($id)
    {
        return DB::table('tbl_pengajuan')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_pengajuan')->insert($data);
    }
}
