<?php

namespace App\Http\Controllers;

use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        // $data = PengajuanModel::all();

        // Get data pengajuan from model pengajuan
        $mPengajuan = new PengajuanModel();
        $data = $mPengajuan->getChart();

        // Generate random colours for the query
        for ($i = 0; $i <= count($data); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        // Parse data chart to json
        $chart = [
            "labels" => (array_keys($data)),
            "dataset" => (array_values($data)),
            "colours" => $colours
        ];

        return view('pengajuan.laporan', compact('chart'));
    }

    public function download(Request $request)
    {
        $image = $request->image;
        $view  = \View::make('pengajuan.export_chart', compact('image'))->render();
        return PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'margin' => '4em 1em 4em 1em'
        ])
            ->loadHtml($view)
            ->setPaper('A4')
            ->stream(date('YmdHis') . ".pdf");
    }
}
