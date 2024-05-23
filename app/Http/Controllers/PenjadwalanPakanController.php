<?php

namespace App\Http\Controllers;

use App\Models\PenjadwalanPakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjadwalanPakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penjadwalan.pakan.index');
    }

    public function data()
    {
        $query = PenjadwalanPakan::all();
        return datatables()
            ->of($query)
            ->addIndexColumn()
            ->editColumn('status_pakan', function ($query) {
                return $query->status_pakan == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function ($query) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('penjadwalanpakan.show', $query->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('penjadwalanpakan.destroy', $query->id) . '`,`' . $query->waktu_mulai . '`)"><i class="fas fa-trash"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'waktu_mulai' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Maaf data yang anda masukkan tidak valid'], 422);
        }

        $data = [
            'waktu_mulai' => $request->waktu_mulai
        ];

        $penjadwalanPakan = PenjadwalanPakan::create($data);

        return response()->json(['data' => $penjadwalanPakan, 'message' => 'Data berhasil disimpan'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjadwalanPakan = PenjadwalanPakan::findOrfail($id);

        return response()->json(['data' => $penjadwalanPakan], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjadwalanPakan $penjadwalanPakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'waktu_mulai' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Maaf data yang anda masukkan tidak valid'], 422);
        }

        $data = [
            'waktu_mulai' => $request->waktu_mulai
        ];

        $penjadwalanPakan = PenjadwalanPakan::findOrfail($id);

        $penjadwalanPakan->update($data);

        return response()->json(['data' => $penjadwalanPakan, 'message' => 'Data berhasil disimpan'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjadwalanPakan = PenjadwalanPakan::findOrfail($id);
        $penjadwalanPakan->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
