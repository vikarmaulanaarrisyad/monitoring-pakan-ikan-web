<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PemberiMinum;
use Illuminate\Http\Request;

class ApiSensorMinumController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'jarak'             => $request->waterLevelParcent,
            'presentase_minum'  => $request->waterDistance,
            'status_minum'      => $request->pakanStatus,
        ];

        PemberiMinum::create($data);

        return 'Berhasil';
    }
}
