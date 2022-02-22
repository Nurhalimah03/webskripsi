<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengajuanModel extends Model
{
    use HasFactory;
    public $builder;

    protected $table = "tbl_pengajuan";
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'kk',
        'nik',
        'nama',
        'alamat',
        'status',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->builder = DB::table($this->table);
    }

    public function allData()
    {
        return $this->builder->get();
    }

    public function detailData($id)
    {
        return $this->builder->where('id', $id)->first();
    }

    public function addData($data)
    {
        $this->builder->insert($data);
    }

    public function search($key)
    {
        return $this->builder->get('key', $key);
    }

    // Get pengajuan grouped by status
    public function getChart()
    {
        $query = $this->builder
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')->all();
        return $query;
    }
}
