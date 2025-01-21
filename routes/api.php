<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LyricController;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Users
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::delete('users/{id}', [UserController::class, 'destroy']);
Route::post('users/{id}', [UserController::class, 'update']);


// Categories
Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);


// auth
Route::post('auth/login', [LoginController::class, 'login']);

// Songs
Route::get('songs', [SongController::class, 'index']);


// Lyrics

Route::get('lyrics', [LyricController::class, 'index']);