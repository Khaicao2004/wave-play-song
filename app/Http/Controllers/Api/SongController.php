<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Song::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['cover_image', 'file']);
        if($request->hasFile('cover_image')){
            $data['cover_image'] = Storage::put('uploads/songs/image', $request->file('cover_image'));
        }
        if($request->hasFile('audio_file')){
            $data['audio_file'] = Storage::put('uploads/songs/audio', $request->file('audio_file'));
        }
       $song =  Song::query()->create($data);
        if($request->artist_id){
           $song->artists()->sync($request->artist_id);
        }
        return response()->json($song);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::findOrFail($id);
        return response()->json($song);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = Song::findOrFail($id);
        $data = $request->except(['cover_image', 'file']);
        if($request->hasFile('cover_image')){
            $data['cover_image'] = Storage::put('uploads/songs/image', $request->file('cover_image'));
        }
        if($request->hasFile('audio_file')){
            $data['audio_file'] = Storage::put('uploads/songs/audio', $request->file('audio_file'));
        }
        $song->update($data);
        return response()->json($song);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
