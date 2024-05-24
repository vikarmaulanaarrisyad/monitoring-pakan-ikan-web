<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('faq.index');
    }

    public function data()
    {
        $query = Faq::all();

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('pertanyaan', function ($query) {
                return substr($query->pertanyaan, 0, 50) . '...';
            })
            ->addColumn('jawaban', function ($query) {
                return substr($query->jawaban, 0, 50) . '...';
            })
            ->addColumn('action', function ($query) {
                return '
                <button onclick="editForm(`' . route('faq.show', $query->id) . '`)" class="btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-link text-danger" onclick="deleteData(`' . route('faq.destroy', $query->id) . '`, `' . $query->pertanyaan . '`)"><i class="fas fa-trash-alt"></i></button>
                ';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Something went wrong'], 422);
        }

        Faq::create($request->all());

        return response()->json(['message' => 'Faq created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return response()->json(['data' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $rules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Something went wrong'], 422);
        }

        $faq->update($request->all());

        return response()->json(['message' => 'Faq updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json(['message' => 'Faq deleted successfully'], 200);
    }
}
