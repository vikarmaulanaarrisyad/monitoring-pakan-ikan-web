<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiSensorPakanController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'jarak'             => $request->jarak,
            'presentase_pakan'  => $request->presentase_pakan,
            'status_pakan'      => $request->status_pakan,
        ];

        PemberiMinum::create($data);

        return 'Berhasil';
    }
}
