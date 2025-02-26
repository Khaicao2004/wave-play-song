<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lyric;
use Illuminate\Http\Request;

class LyricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Lyric::with('song')->get();
       return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Lyric::query()->create($request->all());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lyric = Lyric::findOrFail($id);
        return response()->json($lyric);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $lyric = Lyric::findOrFail($id);
       $lyric->update($request->all());
       return response()->json($lyric);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
