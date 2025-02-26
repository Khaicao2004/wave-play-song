<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::all();
       return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('avatar');
        if($request->hasFile('avatar')){
            $data['avatar'] = Storage::put('uploads/users', $request->file('avatar'));
        }
       $user =  User::query()->create($data);
       return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       try {
        $user = User::findOrFail($id);
        $oldAvatar = $user->avatar;
        $data = $request->except('avatar');
        if($request->hasFile('avatar')){
            $data['avatar'] = Storage::put('uploads/users', $request->file('avatar'));
        }
        $user->update($data);
        if($request->hasFile('avatar') && $oldAvatar){
            Storage::delete($oldAvatar);
        }
       return response()->json($user);
       } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if($user->avatar){
            Storage::delete($user->avatar);
        }
        return response()->json(204);
    }
}
