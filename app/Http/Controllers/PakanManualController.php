<?php

namespace App\Http\Controllers;

use App\Models\PakanManual;
use Illuminate\Http\Request;

class PakanManualController extends Controller
{
    public function store(Request $request)
    {
        //cek status_pakan
        $cekStatusPakan = PakanManual::first();

        if ($cekStatusPakan->status_pakan == 0) {
            $statusPakan = 1;
        } else {
            $statusPakan = 0;
        }

        PakanManual::updateOrCreate(['id' => 1], ['status_pakan' => $statusPakan]);

        return response()->json(['message' => 'Pemberian pakan berhasil', 'data' => $statusPakan]);
    }

    public function getStatus()
    {
        $status = PakanManual::first()->status_pakan;
        return response()->json(['status' => $status]);
    }
}
