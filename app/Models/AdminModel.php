<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    public $table = "tbl_admin";
    public $guarded = [];
    public $timestamps = false;

    public function allData()
    {
       return DB::table('tbl_admin')->get();
    }

    public function detailData($id)
    {
        return DB::table('tbl_admin')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_admin')->insert($data);
    }
}
