<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PakanManual;
use App\Models\SensorPakan;
use Illuminate\Http\Request;

class ApiSensorPakanController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'jarak'             => $request->pakanDistance,
            'presentase_pakan'  => $request->pakanLevelPercent,
            'status_pakan'      => $request->statusPakan,
        ];

        SensorPakan::create($data);

        return 'Berhasil';

        // return response()->json(['message' => 'Berhasil'], 200);
    }

    public function bacaStatusPakan()
    {
        $statusPakan = PakanManual::first();
        return $statusPakan->status_pakan;
    }
}
