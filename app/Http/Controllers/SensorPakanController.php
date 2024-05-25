<?php

namespace App\Http\Controllers;

use App\Models\SensorPakan;
use Illuminate\Http\Request;

class SensorPakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datasensor.pakan.index');
    }

    public function data()
    {
        $query = SensorPakan::orderBy('id', 'DESC')->get();
        return datatables($query)
            ->addIndexColumn()
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'jarak'             => $request->jarak,
            'presentase_pakan'  => $request->presentase_pakan,
            'status_pakan'      => $request->status_pakan,
        ];

        SensorPakan::create($data);

        return 'Berhasil';
    }

    public function bacadata()
    {
        $query = SensorPakan::all();
        return response()->json($query);
    }

    public function deleteAll()
    {
        SensorPakan::truncate();

        return response()->json(['message' => 'Data Berhasil dihapus']);
    }
}
