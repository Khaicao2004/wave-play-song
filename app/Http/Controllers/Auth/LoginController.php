<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

           return response()->json([
            'message' => 'Login successfully',
            'user' => $user
           ]);
        }else{
            return response()->json([
                'message' => 'Login Error'
            ]);
        }
    }
}
