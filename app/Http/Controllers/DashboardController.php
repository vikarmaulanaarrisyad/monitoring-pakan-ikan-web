<?php

namespace App\Http\Controllers;

use App\Models\SensorPakan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function getDataPakan()
    {
        $data = SensorPakan::latest()->limit(5)
            ->get();

        $listTanggal = $data->pluck('created_at')->toArray();
        $listPersentasePakan = $data->pluck('presentase_pakan')->toArray();

        // Mengubah format tanggal menjadi format Indonesia
        $listTanggalFormatted = $this->tanggal_indonesia($listTanggal);

        return [
            'listTanggal' => $listTanggalFormatted,
            'listPersentasePakan' => $listPersentasePakan,
        ];
    }


    private function tanggal_indonesia(array $tanggalArray)
    {
        return array_map(function ($tanggal) {
            return Carbon::parse($tanggal)->format('d-m-Y H:i:s');
        }, $tanggalArray);
    }
}
