<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiSensorMinumController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'jarak'             => $request->jarak,
            'presentase_minum'  => $request->presentase_minum,
            'status_minum'      => $request->status_minum,
        ];

        PemberiMinum::create($data);

        return 'Berhasil';
    }
}
