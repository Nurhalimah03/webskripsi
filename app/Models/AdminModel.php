<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    use HasFactory;
    public $builder;

    public $table = "users";
    public $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'email',
        'name',
        'jabatan',
        'nohp',
        'role',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->builder = DB::table($this->table);
    }

    public function allData()
    {
        $query = $this->builder
            ->select('*')
            ->where('role', 'admin')->get();
        return $query;
    }

    public function detailData($id)
    {
        return $this->builder->where('id', $id)->first();
    }

    public function addData($data)
    {
        $this->builder->insert($data);
    }
}
