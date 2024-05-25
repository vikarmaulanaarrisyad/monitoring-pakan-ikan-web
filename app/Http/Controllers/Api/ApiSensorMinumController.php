<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PemberiMinum;
use Illuminate\Http\Request;

class ApiSensorMinumController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        $data = [
            'jarak'             => $request->waterDistance,
            'presentase_minum'  => $request->waterLevelPercent,
            'status_minum'      => $request->statusMinum,
        ];

        PemberiMinum::create($data);

        return 'Berhasil';
    }
}
