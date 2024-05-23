<?php

namespace App\Http\Controllers;

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
        $query = PemberiMinum::all();
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
