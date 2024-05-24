<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('about.index');
    }

    public function data()
    {
        $query = About::all();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn("path_image", function ($query) {
                return '<img src="' . Storage::url($query->path_image) . '" width="50px; height="40px">';
            })
            ->editColumn('content', function ($query) {
                return substr($query->content, 0, 40) . '...';
            })
            ->addColumn('action', function ($query) {
                return '
                        <button class="btn btn-sm btn-primary" onclick="editForm(`' . route('abouts.show', $query->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $about = About::findOrfail($id);
        $about->path_image = Storage::url($about->path_image);

        return response()->json(['data' => $about]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'path_image' => 'required|mimes:jpg,png,jpeg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Maaf, terjadi kesalahan'], 422);
        }

        $about = About::findOrfail($id);
        $data = $request->except('path_image');

        if ($request->hasFile('path_image')) {
            if (Storage::disk('public')->exists($about->path_image)) {
                Storage::disk('public')->delete($about->path_image);
            }

            $data['path_image'] = upload('about', $request->file('path_image'), 'about');
        }

        $about->update($data);

        return response()->json(['message' => 'Data Berhasil Disimpan'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
