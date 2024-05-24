<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('feature.index');
    }

    public function data()
    {
        $query = Feature::all();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('description', function ($query) {
                return substr($query->description, 0, 50) . '...';
            })
            ->addColumn('action', function ($query) {
                return '
                <button onclick="editForm(`' . route('feature.show', $query->id) . '`)" class="btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-link text-danger" onclick="deleteData(`' . route('feature.destroy', $query->id) . '`, `' . $query->title . '`)"><i class="fas fa-trash-alt"></i></button>
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
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Something went wrong'], 422);
        }

        Feature::create($request->all());

        return response()->json(['message' => 'Feature created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return response()->json(['data' => $feature], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Something went wrong'], 422);
        }

        $feature->update($request->all());

        return response()->json(['message' => 'Feature updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return response()->json(['message' => 'Feature deleted successfully'], 200);
    }
}
