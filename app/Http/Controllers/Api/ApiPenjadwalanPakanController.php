<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjadwalanPakan;
use Illuminate\Http\Request;

class ApiPenjadwalanPakanController extends Controller
{
    public function index()
    {
        $penjadwalan = PenjadwalanPakan::all();

        return $penjadwalan;
    }

    public function getJadwalPakan(Request $request)
    {
        // Mengambil waktu saat ini di zona waktu Asia/Jakarta
        $date = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $jamSekarang = $date->format('H:i:s');

        \Log::info('Current time: ' . $jamSekarang);

        // Fetch the schedule with the current time
        $penjadwalan = PenjadwalanPakan::where('waktu_mulai', $jamSekarang)->get();

        foreach ($penjadwalan as $jadwal) {
            \Log::info('Checking jadwal with waktu_mulai: ' . $jadwal->waktu_mulai);
            $jadwal->update(['status_pakan' => 1]); // Update with integer
            \Log::info('Updated status_pakan for jadwal with id: ' . $jadwal->id);
        }

        return response()->json($penjadwalan);
    }


    public function getJadwalPakan1(Request $request)
    {
        // Mengambil waktu saat ini
        $jamSekarang = date('H:i:s');

        $penjadwalan = PenjadwalanPakan::where('waktu_mulai', '=', $jamSekarang)->get();

        foreach ($penjadwalan as $jadwal) {

            if ($jadwal->waktu_mulai == $jamSekarang) {
                $jadwal->update([
                    'status_pakan' => 1,
                ]);
            }
        }

        return response()->json($penjadwalan);
    }


    public function bacaData()
    {
        $penjadwalan = PenjadwalanPakan::where('status_pakan', 1)->first();

        if ($penjadwalan !== null && $penjadwalan->status_pakan > 0) {
            return 1;
        }

        return 0;
    }

    public function ubahStatus(Request $request)
    {
        $penjadwalan = PenjadwalanPakan::where('status_pakan', 1)->first();
        $penjadwalan->update([
            'status_pakan' => 0,
        ]);

        return 'Berhasil';
    }
}
