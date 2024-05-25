<?php

namespace App\Http\Controllers;

use App\Models\PakanManual;
use App\Models\PemberiMinum;
use Illuminate\Http\Request;

class PemberiMinumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datasensor.minum.index');
    }

    public function data()
    {
        $query = PemberiMinum::orderBy('id', 'DESC')->get();
        return datatables($query)
            ->addIndexColumn()
            ->toJson();
    }

    public function getStatus()
    {
        $status = PakanManual::first()->status;
        return response()->json(['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    public function bacadata()
    {
        $query = PemberiMinum::all();
        return response()->json($query);
    }

    public function deleteAll()
    {
        PemberiMinum::truncate();

        return response()->json(['message' => 'Data Berhasil dihapus']);
    }
}
