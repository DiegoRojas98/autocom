<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

#Route::get('/user', [UserController::class,'index']); #->middleware('auth:sanctum') solo usuarios con inicio de sesion

Route::resource('/user',UserApiController::class);
